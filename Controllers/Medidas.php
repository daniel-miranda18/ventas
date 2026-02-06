<?php
class Medidas extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->views->getView($this, "index"); 
    }

    public function listar(){
        $data = $this->model->getMedidas();
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]['medida_estado'] == 1){
                $data[$i]['medida_estado'] = '<span class="badge bg-success text-light btn-sm">Activo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarMedida('.$data[$i]['id_medida'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-danger btn-sm" type="button" onclick="btnInactivarMedida('.$data[$i]['id_medida'].')"><i class="fas fa-ban"></i></button>';
            }else{
                $data[$i]['medida_estado'] = '<span class="badge bg-secondary text-light btn-sm">Inactivo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarMedida('.$data[$i]['id_medida'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-success btn-sm" type="button" onclick="btnActivarMedida('.$data[$i]['id_medida'].')"><i class="fas fa-check"></i></button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
        $id_medida = isset($_POST['id_medida']) ? $_POST['id_medida'] : "";
        $descripcion_medida = isset($_POST['descripcion_medida']) ? $_POST['descripcion_medida'] : "";
        $descripcion_corta = isset($_POST['descripcion_corta']) ? $_POST['descripcion_corta'] : "";
        $codigoMedidaSin = isset($_POST['codigoMedidaSin']) ? $_POST['codigoMedidaSin'] : "";

        if(empty($descripcion_medida) || empty($descripcion_corta) || empty($codigoMedidaSin)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id_medida == ""){
                $data = $this->model->registrar($descripcion_medida, $descripcion_corta, $codigoMedidaSin);
                if($data == "ok"){
                    $msg = "ok";
                }else{
                    $msg = "Error al registrar";
                }
            }else{ 
                $data = $this->model->modificar($descripcion_medida, $descripcion_corta, $codigoMedidaSin, $id_medida);
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

    public function get_medida_id($id){
        $data = $this->model->get_medida_id($id);
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