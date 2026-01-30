<?php
    class HomeModel extends Query{
        public function __construct()
        {
            parent::__construct();
        }

        public function getUsers(){
            $sql = "SELECT * FROM usuarios";
            $data = $this->selectAll($sql);
            return $data;
        }
    }
?>