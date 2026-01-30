<?php
class Query extends Connection{
    protected $connection;
    protected $sql;

    public function __construct(){
        parent::__construct();
        $this->connection = $this->connect();
    }

    public function select(string $sql){
        $this->sql = $sql;
        $result = $this->connection->prepare($this->sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll(string $sql){
        $this->sql = $sql;
        $result = $this->connection->prepare($this->sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
