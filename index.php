<?php
    $arrPath = explode("\\",__DIR__);
    $arrPath = array_slice($arrPath,0,4);
    $path = implode("\\",$arrPath);
    include_once $path."\ap.php";
    include_once $path."\controller\controller.php";
    if(isset($controller)){
        switch ($controller) {
            case $controller:
                $data["sub"] = $controller;
                $data["exception"] = strtolower(trim($_SERVER["PATH_INFO"],"/"));
                $data["arrexc"] = ["login","register","forgotpassword"];
                $conditon = $_SERVER["PATH_INFO"];
                $str = substr($conditon,strrpos($conditon,"/"),strlen($conditon));
                $data["sub1"]["pathcss"] = $str;
                if(preg_match("~admin~is",$conditon)){
                    render("layout/layout_admin",$data);
                }else{
                    render("layout/layout_client",$data);
                }
                break;
            default:
                break;
        }
    }
?>