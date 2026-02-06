<?php
class Home extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if(isset($_SESSION['nick'])){
            $this->views->getView($this, "index");
        }else{
            $this->login();
        }
    }

    public function login(){
        $this->views->getView($this, "login");
    }

    public function cerrar_sesion(){
        session_destroy();
        $this->login();
    }
}
?>