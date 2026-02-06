<?php
class MedidasModel extends Query{
    private $descripcion_medida, $descripcion_corta, $codigoMedidaSin, $id_medida, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getMedidas(){
        $sql = "SELECT * FROM medidas";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrar(string $descripcion_medida, string $descripcion_corta, int $codigoMedidaSin){
        $this->descripcion_medida = $descripcion_medida;
        $this->descripcion_corta = $descripcion_corta;
        $this->codigoMedidaSin = $codigoMedidaSin;
        $sql = "INSERT INTO medidas (descripcion_medida, descripcion_corta, codigoMedidaSin, medida_estado) VALUES (?, ?, ?, ?)";
        $data = array($this->descripcion_medida, $this->descripcion_corta, $this->codigoMedidaSin, 1);
        $dta = $this->save($sql, $data);
        if($dta == 1){
            $res = "ok";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function get_medida_id(int $id){
        $sql = "SELECT * FROM medidas WHERE id_medida = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificar(string $descripcion_medida, string $descripcion_corta, int $codigoMedidaSin, int $id_medida){
        $this->id_medida = $id_medida;
        $this->descripcion_medida = $descripcion_medida;
        $this->descripcion_corta = $descripcion_corta;
        $this->codigoMedidaSin = $codigoMedidaSin;
        $sql = "UPDATE medidas SET descripcion_medida = ?, descripcion_corta = ?, codigoMedidaSin = ? WHERE id_medida = ?";
        $data = array($this->descripcion_medida, $this->descripcion_corta, $this->codigoMedidaSin, $this->id_medida);
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
        $this->id_medida = $id;
        $sql = "UPDATE medidas SET medida_estado = ? WHERE id_medida = ?";
        $data = array($this->estado, $this->id_medida);
        $result = $this->save($sql, $data);
        return $result;
    }
}
?>