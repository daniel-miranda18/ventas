<?php
class Users extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

     public function index() {
        $data['caja'] = $this->model->getCajas();
        $this->views->getView($this, "index", $data); 
    }

    public function listar(){
        $data = $this->model->getUsers();
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]['usuario_estado'] == 1){
                $data[$i]['usuario_estado'] = '<span class="badge bg-success text-light btn-sm">Activo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarUsuario('.$data[$i]['id_usuario'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-danger btn-sm" type="button" onclick="btnInactivarUsuario('.$data[$i]['id_usuario'].')"><i class="fas fa-ban"></i></button>';
            }else{
                $data[$i]['usuario_estado'] = '<span class="badge bg-secondary text-light btn-sm">Inactivo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarUsuario('.$data[$i]['id_usuario'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-success btn-sm" type="button" onclick="btnActivarUsuario('.$data[$i]['id_usuario'].')"><i class="fas fa-check"></i></button>';
            }
        }
        echo json_encode($data);
        die();
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
                $_SESSION['nick'] = $data['nick'];
                $_SESSION['nombre'] = $data['nombre'];
            }else{
                $msg = "Usuario o Contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
        $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : "";
        $nick = isset($_POST['nick']) ? $_POST['nick'] : "";
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $clave = isset($_POST['clave']) ? $_POST['clave'] : "";
        $confirmar = isset($_POST['confirmar']) ? $_POST['confirmar'] : "";
        $id_caja = isset($_POST['id_caja']) ? $_POST['id_caja'] : "";

        if(empty($nick) || empty($nombre)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id_usuario == ""){
                if(empty($clave) || empty($confirmar)){
                    $msg = "Las contraseñas son obligatorias";
                }else if($clave != $confirmar){
                    $msg = "Las contraseñas deben coincidir";
                }else{
                    $data = $this->model->registrar($nick, $nombre, md5($clave), $id_caja);
                    if($data == "ok"){
                        $msg = "ok";
                    }else{
                        $msg = "Error al registrar";
                    }
                }
            }else{ 
                $data = $this->model->modificar($nick, $nombre, $id_caja, $id_usuario);
                if($data == "modif"){
                    $msg = "modif";
                }else{
                    $msg = "Error al modificar";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function get_usuario_id($id){
        $data = $this->model->get_usuario_id($id);
        echo json_encode($data);
        die();
    }

    public function inactivar($id){
        $data = $this->model->status(0, $id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al inactivar";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function activar($id){
        $data = $this->model->status(1, $id);
        if($data == 1){
            $msg = "ok";
        }else{
            $msg = "Error al activar";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}