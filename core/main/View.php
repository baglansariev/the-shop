<?php
    namespace core\main;

    class View
    {
        // Returns view with page layout
        public function renderLayout($view, $arr = [], $error = false, $layout = 'default')
        {
            // In case of "Page not Found"
            if ($error)
            {
                http_response_code($error);
            }
            extract($arr);

            $content = $this->obInclude(VIEW_DIR . $view . '.php', $arr);

            require_once(LAYOUT_DIR . $layout . '.php');
        }

        // Returns only view
        public function renderView($view, $arr = [])
        {
            $output = $this->obInclude(VIEW_DIR . $view . '.php', $arr);

            return $output;
        }

        private function obInclude($path, $arr)
        {
            if (file_exists($path))
            {
                extract($arr);

                ob_start();
                require_once($path);
                return ob_get_clean();
            }
            return false;
        }
    }