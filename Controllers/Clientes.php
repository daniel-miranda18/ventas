<?php
class Clientes extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->views->getView($this, "index"); 
    }

    public function listar(){
        $data = $this->model->getClientes();
        for ($i=0; $i < count($data); $i++) {
            $data[$i]['tipo_documento'] = ($data[$i]['tipo_documento'] == 1) ? 'CI' : 'NIT';
            
            if($data[$i]['cliente_estado'] == 1){
                $data[$i]['cliente_estado'] = '<span class="badge bg-success text-light btn-sm">Activo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCliente('.$data[$i]['id_cliente'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-danger btn-sm" type="button" onclick="btnInactivarCliente('.$data[$i]['id_cliente'].')"><i class="fas fa-ban"></i></button>';
            }else{
                $data[$i]['cliente_estado'] = '<span class="badge bg-secondary text-light btn-sm">Inactivo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCliente('.$data[$i]['id_cliente'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-success btn-sm" type="button" onclick="btnActivarCliente('.$data[$i]['id_cliente'].')"><i class="fas fa-check"></i></button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
        $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
        $documentoid = isset($_POST['documentoid']) ? $_POST['documentoid'] : "";
        $complementoid = isset($_POST['complementoid']) ? $_POST['complementoid'] : "";
        $tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : "";
        $razon_social = isset($_POST['razon_social']) ? $_POST['razon_social'] : "";
        $cliente_email = isset($_POST['cliente_email']) ? $_POST['cliente_email'] : "";

        if(empty($documentoid) || empty($razon_social)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id_cliente == ""){
                $data = $this->model->registrar($documentoid, $complementoid, $tipo_documento, $razon_social, $cliente_email);
                if($data == "ok"){
                    $msg = "ok";
                }else{
                    $msg = "Error al registrar";
                }
            }else{ 
                $data = $this->model->modificar($documentoid, $complementoid, $tipo_documento, $razon_social, $cliente_email, $id_cliente);
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

    public function get_cliente_id($id){
        $data = $this->model->get_cliente_id($id);
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