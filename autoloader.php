<?php

function __autoload($class)
{ require_once sprintf('%s/%s.php', __DIR__, str_replace('\\', '/', $class)); }
