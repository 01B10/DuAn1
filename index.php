<?php 
    include_once "./ap.php";
    include_once "./model/sqldb.php";
    include_once "./controller/controller.php";
    if(isset($controller)){
        switch ($controller) {
            case $controller:
                $data = [];
                $data["listservice"] = getAllData("*","list_service");
                render($controller,$data);
                break;
            default:
                # code...
                break;
        }
    }
?>