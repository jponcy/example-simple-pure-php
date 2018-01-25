<?php

namespace Utils {

class Strings {
    public static function capitalize(string $str): string
    { return ucfirst(strtolower($str)); }
}
}