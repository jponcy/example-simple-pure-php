<?php
namespace Dao;


use Model\Model;

abstract class AbstractDao implements Dao
{
    use \Utils\SinglettonTrait;

    private static $model = null;

    protected function __construct()
    {}

    /**
     * Finds all entities about linked model.
     * @return Model[]
     */
    public function findAll() {
        $result = null;
        $connection = \Utils\Database::createConnection();

        /** @var \Statement $statement */
        $statement = $connection->prepare(sprintf('SELECT * FROM abilities'));

        if ($statement->execute()) {
            $result = [];

            array_walk(
                    $statement->fetchAll(),
                    function ($data) use(&$result) { $result[] = $this->createInstance($data); });
        }

        return $result;
    }

    // ***** ***** INTERNALS.

    /** Get internal model representation. */
    protected function getModel() {
        if (self::$model == null) {
            self::$model = new class ($this) {
                private $fields = [];
                private $className = null;

                public function __construct($dao) {
                    $matches = [];

                    if (preg_match('/^Dao\\\\(\w+)Dao$/', get_class($dao), $matches) && count($matches) == 2) {
                        $this->className = sprintf('Model\\%s', $matches[1]);

                        $this->fields = array_map(function ($element) {
                            return $element->name;
                        }, (new \ReflectionClass($this->className))->getProperties());
                    } else {
                        throw new \Exception('Whaaaa');
                    }
                }

                public function __get($property) {
                    return ($property == 'fields') ? $this->fields : null;
                }

                public function createInstance():Model {
                    $class = $this->className;
                    return new $class();
                }
            };
        }

        return self::$model;
    }

    /** Creates an instance of the linked model and fills with given data. */
    protected function createInstance(array $data) {
        $object = $this->getModel()->createInstance();

        foreach ($this->getModel()->fields as $field) {
            $method = sprintf('set%s', ucfirst($field));
            $object->$method($data[$field]);
        }

        return $object;
    }
}
