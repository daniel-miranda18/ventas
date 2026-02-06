<?php
class CajasModel extends Query{
    private $nombre_caja, $id_caja, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCajas(){
        $sql = "SELECT * FROM cajas";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrar(string $nombre_caja){
        $this->nombre_caja = $nombre_caja;
        $sql = "INSERT INTO cajas (nombre_caja, caja_estado) VALUES (?, ?)";
        $data = array($this->nombre_caja, 1);
        $dta = $this->save($sql, $data);
        if($dta == 1){
            $res = "ok";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function get_caja_id(int $id){
        $sql = "SELECT * FROM cajas WHERE id_caja = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificar(string $nombre_caja, int $id_caja){
        $this->id_caja = $id_caja;
        $this->nombre_caja = $nombre_caja;
        $sql = "UPDATE cajas SET nombre_caja = ? WHERE id_caja = ?";
        $data = array($this->nombre_caja, $this->id_caja);
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
        $this->id_caja = $id;
        $sql = "UPDATE cajas SET caja_estado = ? WHERE id_caja = ?";
        $data = array($this->estado, $this->id_caja);
        $result = $this->save($sql, $data);
        return $result;
    }
}
?>