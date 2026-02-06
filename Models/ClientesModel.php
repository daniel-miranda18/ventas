<?php
class ClientesModel extends Query{
    private $documentoid, $complementoid, $tipo_documento, $razon_social, $cliente_email, $id_cliente, $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function getClientes(){
        $sql = "SELECT * FROM clientes";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrar(string $documentoid, string $complementoid, int $tipo_documento, string $razon_social, string $cliente_email){
        $this->documentoid = $documentoid;
        $this->complementoid = $complementoid;
        $this->tipo_documento = $tipo_documento;
        $this->razon_social = $razon_social;
        $this->cliente_email = $cliente_email;

        $sql = "INSERT INTO clientes (documentoid, complementoid, tipo_documento, razon_social, cliente_email, cliente_estado) VALUES (?, ?, ?, ?, ?, ?)";
        $data = array($this->documentoid, $this->complementoid, $this->tipo_documento, $this->razon_social, $this->cliente_email, 1);
        $dta = $this->save($sql, $data);
        if($dta == 1){
            $res = "ok";
        }else{
            $res = "Error";
        }
        return $res;
    }

    public function get_cliente_id(int $id){
        $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function modificar(string $documentoid, string $complementoid, int $tipo_documento, string $razon_social, string $cliente_email, int $id_cliente){
        $this->id_cliente = $id_cliente;
        $this->documentoid = $documentoid;
        $this->complementoid = $complementoid;
        $this->tipo_documento = $tipo_documento;
        $this->razon_social = $razon_social;
        $this->cliente_email = $cliente_email;

        $sql = "UPDATE clientes SET documentoid = ?, complementoid = ?, tipo_documento = ?, razon_social = ?, cliente_email = ? WHERE id_cliente = ?";
        $data = array($this->documentoid, $this->complementoid, $this->tipo_documento, $this->razon_social, $this->cliente_email, $this->id_cliente);
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
        $this->id_cliente = $id;
        $sql = "UPDATE clientes SET cliente_estado = ? WHERE id_cliente = ?";
        $data = array($this->estado, $this->id_cliente);
        $result = $this->save($sql, $data);
        return $result;
    }
}
?>