<?php
class Connection{
    protected $connect;

    public function __construct(){
        $pdo = "mysql:host=".host.";dbname=".dbname.";charset=".charset;
        try {
            $this->connect = new PDO($pdo, username, password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error en la conexión ".$e->getMessage());
        }
    }

    public function connect(){
        return $this->connect;
    }
}
?>
