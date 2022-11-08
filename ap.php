<?php 
    include_once "./route.php";
    include_once "./model/sqldb.php";
    define("_DIR_ROOT",__DIR__);
    if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
        $web_root = "https://".$_SERVER["HTTP_HOST"];
    }else{
        $web_root = "http://".$_SERVER["HTTP_HOST"];
    }
    $dirRoot = str_replace("\\","/",_DIR_ROOT);
    $dcm = $_SERVER["DOCUMENT_ROOT"];
    $folder = str_replace($dcm,"",$dirRoot);
    $web_root = $web_root.$folder;
    define("_WEB_ROOT_",$web_root);
    if(!empty($_SERVER["PATH_INFO"])){
        $controller = $_SERVER["PATH_INFO"];
        $controller = trim($controller,"/");
        $boolean = false;
        foreach($route as $key => $value){
            if(strtolower($controller) == strtolower($key)){
                $controller = $value;
                $boolean = true;
            }
        }

        if(!$boolean){
            require_once _DIR_ROOT."\\erorr\\404.php";
        }
    }else{
        require_once _DIR_ROOT."\\views\\client\\test.php";
    }
?>