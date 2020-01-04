<?php
    // Directories
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
    define('CONFIG_DIR', DOCUMENT_ROOT . '/core/config/');
    define('LIB_DIR', DOCUMENT_ROOT . '/core/lib/');
    define('VIEW_DIR', DOCUMENT_ROOT . '/app/views/');
    define('LAYOUT_DIR', VIEW_DIR . 'layouts/');


    // DB configs
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'the_shop');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '123');

    // Other constants
    define('DS', DIRECTORY_SEPARATOR);