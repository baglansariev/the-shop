<?php
    namespace app\controllers\product;
    use core\lib\Request;
    use core\lib\Response;

    class AjaxController
    {
        private $request;
        private $response;

        public function __construct()
        {
            $this->request = new Request;
            $this->response = new Response;
        }

        public function rating()
        {
            if ( $this->request->has('product_id') && $this->request->has('rating') )
            {
                if ( (new Rating) -> setRating((int)$this->request->post('product_id'), (int)$this->request->post('rating')) )
                {
                    $this->response->outputJson(['status' => true]);
                    exit;
                }
                $this->response->outputJson(['status' => false]);
                exit;
            }
        }
    }