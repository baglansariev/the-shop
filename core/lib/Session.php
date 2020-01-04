<?php
    namespace core\lib;

    class Session
    {
        public function start()
        {
            session_start();
        }

        public function set($key, $value)
        {
            $_SESSION[strval($key)] = $value;
        }

        public function push($key, $data)
        {
            array_push($_SESSION[strval($key)], $data);
        }

        public function get($key = false)
        {
            if ($key)
            {
                if ( isset($_SESSION[strval($key)]) )
                {
                    return $_SESSION[strval($key)];
                }
                return false;
            }
            return $_SESSION;
        }

        public function del($key)
        {
            if ( isset($_SESSION[strval($key)]) )
            {
                unset($_SESSION[strval($key)]);
            }
        }

        public function has($key)
        {
            if ( !empty( $_SESSION[strval($key)] ) )
            {
                return true;
            }
            return false;
        }

        public function clear()
        {
            session_destroy();
        }
    }