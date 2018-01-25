<?php
namespace Utils;

class Database
{
    private static $connectionInstance = null;

    /** Private constructor => DP singletton. */
    private function __construct() {}

    /**
     * Creates then returns a new connection to SGBDr.
     * @return PDO The connection.
     */
    public static function createConnection(): \PDO
    {
        if (self::$connectionInstance == null) {
            require '../conf.php';

            $connectionString = sprintf('%s:host=%s;dbname=%s', $db->sgbd, $db->host, $db->database);

            self::$connectionInstance = new \PDO($connectionString, $db->user, $db->password, $db->options ?? []);
        }

        return self::$connectionInstance;
    }
}
