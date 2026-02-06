<?php
class Categorias extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->views->getView($this, "index"); 
    }

    public function listar(){
        $data = $this->model->getCategorias();
        for ($i=0; $i < count($data); $i++) { 
            if($data[$i]['categoria_estado'] == 1){
                $data[$i]['categoria_estado'] = '<span class="badge bg-success text-light btn-sm">Activo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCategoria('.$data[$i]['id_categoria'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-danger btn-sm" type="button" onclick="btnInactivarCategoria('.$data[$i]['id_categoria'].')"><i class="fas fa-ban"></i></button>';
            }else{
                $data[$i]['categoria_estado'] = '<span class="badge bg-secondary text-light btn-sm">Inactivo</span>';
                $data[$i]['acciones'] = '<button class="btn btn-warning btn-sm" type="button" onclick="btnEditarCategoria('.$data[$i]['id_categoria'].')"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-success btn-sm" type="button" onclick="btnActivarCategoria('.$data[$i]['id_categoria'].')"><i class="fas fa-check"></i></button>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar(){
        $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : "";
        $nombre_categoria = isset($_POST['nombre_categoria']) ? $_POST['nombre_categoria'] : "";
        $codigoProductoSin = isset($_POST['codigoProductoSin']) ? $_POST['codigoProductoSin'] : "";

        if(empty($nombre_categoria) || empty($codigoProductoSin)){
            $msg = "Todos los campos son obligatorios";
        }else{
            if($id_categoria == ""){
                $data = $this->model->registrar($nombre_categoria, $codigoProductoSin);
                if($data == "ok"){
                    $msg = "ok";
                }else{
                    $msg = "Error al registrar";
                }
            }else{ 
                $data = $this->model->modificar($nombre_categoria, $codigoProductoSin, $id_categoria);
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

    public function get_categoria_id($id){
        $data = $this->model->get_categoria_id($id);
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