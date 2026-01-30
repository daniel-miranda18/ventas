<?php
class Home extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data["usuarios"] = $this->model->getUsers();
        $this->views->getView($this, "index", $data);
    }
}
?>
