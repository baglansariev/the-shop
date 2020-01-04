<?php
    namespace core\lib;

    class Request
    {
        // If $without_params is true, function returns uri without GET parameters
        public function getUri($without_params = false)
        {
            if ($without_params)
            {
                $uri = explode('?', $_SERVER['REQUEST_URI']);

                if (is_array($uri))
                {
                    return strip_tags(array_shift($uri));
                }
            }
            return strip_tags($_SERVER['REQUEST_URI']);
        }

        public function post($key)
        {
            return htmlspecialchars($_POST[$key]);
        }

        public function get($key)
        {
            return htmlspecialchars($_GET[$key]);
        }

        public function request($key)
        {
            return htmlspecialchars($_REQUEST[$key]);
        }

        public function has($key, $method = 'request')
        {
            if ( $this->$method($key) !== null && !empty( $this->$method($key) ) )
            {
                return true;
            }
            return false;
        }
    }