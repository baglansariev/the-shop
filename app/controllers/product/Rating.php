<?php
    namespace app\controllers\product;
    use app\models\Rating as RatingModel;
    use core\lib\Session;

    class Rating
    {
        public $scale;
        private $session;

        public function __construct($scale = 5)
        {
            $this->scale = $scale;
            $this->session = new Session;
        }

        public function getRating($product_id)
        {
            return (new RatingModel) -> getRating((int)$product_id);
        }

        public function setRating($product_id, $raiting)
        {
            if ( !$this->isRated($product_id) )
            {
                $this->setRated($product_id);
                (new RatingModel) -> setRating($product_id, $raiting);
                return true;
            }
            return false;
        }

        // Checks if a client has rated the product before
        private function isRated($product_id)
        {
            if ($this->session->has('rated_' . $product_id))
            {
                return true;
            }
            return false;
        }

        private function setRated($product_id)
        {
            $this->session->set('rated_' . $product_id, true);
        }
    }