<?php
    namespace app\models;
    use core\main\Model;

    class Rating extends Model
    {
        public function getRating($product_id)
        {
            $sql = "SELECT (total / users_rated) AS average FROM product_raiting WHERE product_id = ?";
            return $this->make($sql, [$product_id])->fetch();
        }

        public function setRating($product_id, $raiting)
        {
            $sql = "SELECT COUNT(*) AS count FROM product_raiting WHERE product_id = ?";
            if ($this->make($sql, [$product_id])->fetch()['count'])
            {
                $sql = "UPDATE product_raiting SET users_rated = users_rated + 1, total = total + ? WHERE product_id = ?";
            }
            else
            {
                $sql = "INSERT INTO product_raiting SET users_rated = 1, total = ?, product_id = ?";
            }
            $this->make($sql, [$raiting, $product_id]);
        }
    }