<?php
    namespace app\models;
    use core\main\Model;

    class Transport extends Model
    {
        public function getList()
        {
            $sql = "SELECT * FROM transport";
            return $this->make($sql)->fetchAll();
        }
    }