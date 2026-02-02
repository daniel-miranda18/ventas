<?php
    class Users extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function index(){
            $this->views->getView($this, "Users");
        }

        public function validar(){
            if(empty($_POST['nick']) || empty($_POST['clave'])){
                $msg = "Los campos son obligatorios";
            }else{
                $nick = $_POST['nick'];
                $clave = $_POST['clave'];
                $data = $this->model->getUser($nick, $clave);
                if($data){
                    $msg = "ok";
                }else{
                    $msg = "Usuario o Contraseña incorrecta";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>