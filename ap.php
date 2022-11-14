<?php 
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
    include_once $path."\\route.php";
    include_once $path."\model\sqldb.php";
    $boolean = false;
    if(!empty($_SERVER["PATH_INFO"])){
        $controller = $_SERVER["PATH_INFO"];
        $controller = trim($controller,"/");
        foreach($route as $key => $value){
            if(strtolower($controller) == strtolower($key)){
                $controller = $value;
                $boolean = true;
            }
        }

        // if($boolean == false){
        //     require_once _DIR_ROOT."\\erorr\\404.php";
        // }
    }else{
        header("location: Trang-Chu");
    }
?>