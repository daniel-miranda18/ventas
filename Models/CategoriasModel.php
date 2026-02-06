<?php
class CategoriasModel extends Query{
    private $nombre_categoria, $codigoProductoSin, $id_categoria, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias(){
        $sql = "SELECT * FROM categorias";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrar(string $nombre_categoria, int $codigoProductoSin){
        $this->nombre_categoria = $nombre_categoria;
        $this->codigoProductoSin = $codigoProductoSin;
        $sql = "INSERT INTO categorias (nombre_categoria, codigoProductoSin, categoria_estado) VALUES (?, ?, ?)";
        $data = array($this->nombre_categoria, $this->codigoProductoSin, 1);
        $dta = $this->save($sql, $data);
        if($dta == 1){
            $res = "ok";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function get_categoria_id(int $id){
        $sql = "SELECT * FROM categorias WHERE id_categoria = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificar(string $nombre_categoria, int $codigoProductoSin, int $id_categoria){
        $this->id_categoria = $id_categoria;
        $this->nombre_categoria = $nombre_categoria;
        $this->codigoProductoSin = $codigoProductoSin;
        $sql = "UPDATE categorias SET nombre_categoria = ?, codigoProductoSin = ? WHERE id_categoria = ?";
        $data = array($this->nombre_categoria, $this->codigoProductoSin, $this->id_categoria);
        $dta = $this->save($sql, $data);
        if($dta == 1){
            $res = "modif";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function status(int $estado, int $id){
        $this->estado = $estado;
        $this->id_categoria = $id;
        $sql = "UPDATE categorias SET categoria_estado = ? WHERE id_categoria = ?";
        $data = array($this->estado, $this->id_categoria);
        $result = $this->save($sql, $data);
        return $result;
    }
}
?>