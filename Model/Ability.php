<?php
namespace Model;

class Ability implements Model {
    private $id;
    private $label;

    /**
    * Get id
    * @return id
    */
    public function getId()
    {
        return $this->id;
    }
    /**
    * Set id
    * @return $this
    */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
    * Get label
    * @return label
    */
    public function getLabel()
    {
        return $this->label;
    }
    /**
    * Set label
    * @return $this
    */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }
}
