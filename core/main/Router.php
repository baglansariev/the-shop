<?php
    namespace core\main;
    use core\lib\Session;
    use core\lib\Request;

    class Router
    {
        public $request;
        private $routes;
        private $params = [];

        public function __construct()
        {
            $this->routes = require_once(CONFIG_DIR . 'routes.php');
            $this->request = new Request;
            (new Session) -> start();
        }

        public function run()
        {
            if ( $this->match() )
            {
                $path = 'app\controllers\\' . $this->params['controller'];
                $action = $this->params['action'];

                $controller = new $path();
                $controller->$action();
            }
            else {
                ( new View ) -> renderLayout(404, ['title' => 'Page Not Found'], 404);
            }
        }

        private function match()
        {
            foreach ($this->routes as $key => $val)
            {
                if ( preg_match("#^$key$#", $this->request->getUri()) )
                {
                    $this->params = $val;
                    return true;
                }
            }
            return false;
        }
    }