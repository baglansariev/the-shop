<?php
    namespace core\main;
    use core\lib\Db;

    abstract class Model
    {
        public function make($sql, $args = [])
        {
            if (!$args)
            {
                return Db::instance()->query($sql);
            }

            $stmt = Db::instance()->prepare($sql);
            $stmt->execute($args);

            return $stmt;
        }
    }