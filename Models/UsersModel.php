<?php
    class UsersModel extends Query{
        private $nick, $nombre, $clave, $id_caja, $id_usuario, $estado;

        public function __construct()
        {
            parent::__construct();
        }

        public function getUser(string $nick, string $clave){
            $sql = "SELECT * FROM usuarios WHERE nick = '".$nick."' AND clave = '".md5($clave)."' AND usuario_estado = 1";
            $data = $this->select($sql);
            return $data;
        }

        public function getUsers(){
            $sql = "SELECT u.*, c.nombre_caja FROM usuarios u  INNER JOIN cajas c ON c.id_caja = u.id_caja;";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function getCajas(){
            $sql = "SELECT * FROM cajas WHERE caja_estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrar(string $nick, string $nombre, string $clave, int $id_caja){
            $this->nick = $nick;
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->id_caja = $id_caja;
            $sql = "INSERT INTO usuarios (nick, nombre, clave, id_caja) VALUES (?,?,?,?)";
            $data = array($this->nick, $this->nombre, $this->clave, $this->id_caja);
            $dta = $this->save($sql, $data);
            if($dta == 1){
                $res = "ok";
            }else{
                $res = "Error";
            }
            return $res;
        }

        public function get_usuario_id(int $id){
            $sql = "SELECT * FROM usuarios WHERE id_usuario = '".$id."'";
            $data = $this->select($sql);
            return $data;
        }

        public function modificar(string $nick, string $nombre, int $id_caja, int $id_usuario){
            $this->id_usuario = $id_usuario;
            $this->nick = $nick;
            $this->nombre = $nombre;
            $this->id_caja = $id_caja;
            $this->id_usuario = $id_usuario;

            $sql = "UPDATE usuarios SET nick = ?, nombre = ?, id_caja = ? WHERE id_usuario = ?";
            $data = array($this->nick, $this->nombre, $this->id_caja, $this->id_usuario);
            $dta = $this->save($sql, $data);
            if($dta == 1){
                $res = "modif";
            }else{
                $res = "error";
            }
            return $res;
        }

        public function status(int $estado, $id){
            $this->estado = $estado;
            $this->id_usuario = $id;
            $sql = "UPDATE usuarios SET usuario_estado = ? WHERE id_usuario = ?";
            $data = array($this->estado, $this->id_usuario);
            $result = $this->save($sql, $data);
            return $result;
        }
    }
?>