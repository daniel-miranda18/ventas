<?php
    session_start();
    require_once "Config/Config.php";
    
    $root = !empty($_GET["var"]) ? $_GET["var"] : "Home";
    $array = explode('/', $root);
    $controller = $array[0];
    $method = "index";
    $parameter = "";

    if(!empty($array[1])){
        $method = $array[1];
    }

    if(!empty($array[2])){
        for ($i=2; $i < count($array); $i++) { 
            $parameter .= $array[$i].",";            
        }
        $parameter = trim($parameter, ",");
    }

    require_once "Config/App/Autoload.php";

    $dirController = "Controllers/".$controller.".php";

    if(file_exists($dirController)){
        require_once $dirController;
        $controller = new $controller;
        if(method_exists($controller, $method)){
            $controller->$method($parameter);
        }else{
            echo "No existe el método";
        }
    }else{
        echo "No existe el controlador";
    }
?>