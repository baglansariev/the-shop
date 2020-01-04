<?php
    namespace app\controllers\product;
    use app\models\Product as ProductModel;

    class Product
    {
        public function getList()
        {
            return (new ProductModel) -> getList();
        }

        public function getItem($product_id)
        {
            return (new ProductModel) -> getItem((int)$product_id);
        }
    }