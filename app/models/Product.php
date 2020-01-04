<?php
    namespace app\models;
    use core\main\Model;

    class Product extends Model
    {
        public function getList()
        {
            $sql = "SELECT * FROM products";
            return $this->make($sql)->fetchAll();
        }

        public function getItem($product_id)
        {
            $sql = "SELECT * FROM products WHERE id = ?";
            return $this->make($sql, [$product_id])->fetchAll();
        }
    }