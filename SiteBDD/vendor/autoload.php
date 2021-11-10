<?php

spl_autoload_register(
    function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $paths = ['', 'vendor'];

        foreach ($paths as $path) {
            $file = ($path === '') ? $class . '.php' : join(DIRECTORY_SEPARATOR, [$path, $class . '.php']);
            if (file_exists($file)) {
                return require_once $file;
            }
        }
    }
);