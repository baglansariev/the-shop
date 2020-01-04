<?php
    // Including system configs
    require_once($_SERVER['DOCUMENT_ROOT'] . '/core/config/config.php');

    // Including helper functions
    require_once(LIB_DIR . 'functions.php');

    // Including autoload function
    require_once(CONFIG_DIR . 'autoload.php');

    // Including Router
    ( new \core\main\Router ) -> run();