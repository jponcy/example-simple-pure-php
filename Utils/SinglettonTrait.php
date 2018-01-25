<?php

namespace Utils;

use Dao\Dao;

trait SingletonTrait {
    private static $instance = null;

    private function __construct()
    {}

//     public static function __callStatic(string $property, $args) {
//         if (preg_match('/^(getI|i)nstance$/', $property)) {
//             if (self::$instance == null) {
//                 self::$instance = new static();
//             }

//             return self::$instance;
//         }

//         return null;
//     }

    /** {@inheritdoc} */
    public static function getInstance(): Dao {
        if (self::$instance == null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /** Shortcut for convenient to getInstance. */
    public static function instance(): Dao {
        return self::getInstance();
    }
}
