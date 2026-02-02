<?php
    class UsersModel extends Query{
        public function __construct()
        {
            parent::__construct();
        }

        public function getUser(string $nick, string $clave){
            $sql = "SELECT * FROM usuarios WHERE nick = '".$nick."' AND clave = '".$clave."' AND usuario_estado = 1";
            $data = $this->select($sql);
            return $data;
        }
    }
?>