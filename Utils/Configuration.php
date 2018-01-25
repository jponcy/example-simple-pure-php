<?php

namespace Utils;

/** Configuration class is a class from which we can only get data. */
class Configuration {
    private $parameters = [];

    public function __construct($confs)
    { $this->parameters = $confs ?? []; }

    public function __get($need)
    { return $this->parameters[$need] ?? null; }
}
