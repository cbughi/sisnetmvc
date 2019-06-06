<?php
spl_autoload_register(function ($class) {
    $basedirs[] = '/app/controlador/';
    $basedirs[] = '/app/dominio/';

    foreach($basedirs as $base_dir) {
        $file = __DIR__.$base_dir . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});

spl_autoload_register(function ($class) {
    $prefix = 'br\\univali\\sisnet\\mvc\\nucleo';
    $base_dir = __DIR__ . '/nucleo';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});


