<?php 
    include_once "./ap.php";
    include_once "./model/sqldb.php";
    include_once "./controller/controller.php";
    if(isset($controller)){
        switch ($controller) {
            case $controller:
                $data["sub"] = $controller;
                $conditon = $_SERVER["PATH_INFO"];
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