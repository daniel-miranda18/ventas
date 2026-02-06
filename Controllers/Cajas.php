<?php
class Cajas extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->views->getView($this, "index"); 
    }

    public function listar(){
        $data = $this->model->getCajas();
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]['caja_estado'] == 1){
                $data[$i]['caja_estado'] = '<span class="badge bg-success text-light btn-sm">Activo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCaja('.$data[$i]['id_caja'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-danger btn-sm" type="button" onclick="btnInactivarCaja('.$data[$i]['id_caja'].')"><i class="fas fa-ban"></i></button>';
            }else{
                $data[$i]['caja_estado'] = '<span class="badge bg-secondary text-light btn-sm">Inactivo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCaja('.$data[$i]['id_caja'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-success btn-sm" type="button" onclick="btnActivarCaja('.$data[$i]['id_caja'].')"><i class="fas fa-check"></i></button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
        $id_caja = isset($_POST['id_caja']) ? $_POST['id_caja'] : "";
        $nombre_caja = isset($_POST['nombre_caja']) ? $_POST['nombre_caja'] : "";
        if(empty($nombre_caja)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id_caja == ""){
                $data = $this->model->registrar($nombre_caja);
                if($data == "ok"){
                    $msg = "ok";
                }else{
                    $msg = "Error al registrar";
                }
            }else{ 
                $data = $this->model->modificar($nombre_caja, $id_caja);
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

    public function get_caja_id($id){
        $data = $this->model->get_caja_id($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
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
?>