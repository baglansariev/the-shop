<?php
    namespace core\main;

    abstract class Controller
    {
        public $layout = 'default';

        // Returns page
        public function page($view, $arr = [], $error = false)
        {
            ( new View ) -> renderLayout($view, $arr, $error, $this->layout);
        }

        // Returns just view
        public function view($view, $arr = [])
        {
            return ( new View ) -> renderView($view, $arr);
        }
    }