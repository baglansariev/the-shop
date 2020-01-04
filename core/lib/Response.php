<?php
    namespace core\lib;

    class Response
    {
        public function redirect($location)
        {
            header('Location: ' . $location);
        }

        public function outputJson($data)
        {
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }