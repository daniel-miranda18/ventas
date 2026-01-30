<?php
    class Controller{
        public function __construct()
        {
            $this->loadModel();
            $this->views = new Views;
        }

        public function loadModel(){
            $model = get_class($this)."Model";
            $root = "Models/".$model.".php";
            if(file_exists($root)){
                require_once $root;
                $this->model = new $model;
            }else{
                echo "No existe el modelo";
            }
        }
    }
?>