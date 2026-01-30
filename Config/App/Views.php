<?php
class Views{
    public function getView($controller, $view, $data=""){
        $controller = get_class($controller);

        if(is_array($data)){
            extract($data);
        }

        if($controller == "Home"){
            $view = "Views/".$view.".php";
        }else{
            $view = "Views/".$controller."/".$view.".php";
        }

        if(file_exists($view)){
            require $view;
        }else{
            echo "No existe la vista";
        }
    }
}
?>
