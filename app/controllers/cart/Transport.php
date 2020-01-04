<?php
    namespace app\controllers\cart;
    use app\models\Transport as TransportModel;

    class Transport
    {
        public function getList()
        {
            return (new TransportModel) -> getList();
        }
    }