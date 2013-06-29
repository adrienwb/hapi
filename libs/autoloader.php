<?php

function api_autoloader($class) {
	$class = str_replace('_', '/', $class) . '.class.php';

    if ($resolved_class_file = stream_resolve_include_path(LIBS_CLASSES_PATH.'/'.$class)) {
        return require_once $resolved_class_file;
    }

    if ($resolved_class_file = stream_resolve_include_path(LIBS_CORE_PATH.'/'.$class)) {
        return require_once $resolved_class_file;
    }

}

spl_autoload_register('api_autoloader');
