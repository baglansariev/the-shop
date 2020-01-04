<?php
    namespace core\lib;
    use PDO;

    class Db
    {
        private static $instance = null;

        public static function instance()
        {
            if (self::$instance === null)
            {
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
                $opt = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                self::$instance = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);
            }
            return self::$instance;
        }
    }