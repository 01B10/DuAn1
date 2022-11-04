<?php 
    include_once "./route.php";
    define("_DIR_ROOT",__DIR__);
    if(!empty($_SERVER["PATH_INFO"])){
        $controller = $_SERVER["PATH_INFO"];
        $controller = trim($controller,"/");
        $pattern = "/^\w+/i";
        $boolean = false;
        foreach($route as $key => $value){
            if($controller == $key){
                $controller = $value;
                $boolean = true;
            }
        }

        if(!$boolean){
            $controller = "";
        }
    }else{
        require_once _DIR_ROOT."\\index.php";
    }
?>