<?php 
    include_once "./ap.php";
    include_once "./model/sqldb.php";
    if(isset($controller)){
        switch ($controller) {
            case $controller:
                if (file_exists(_DIR_ROOT."\\views\\".$controller.".php")) {
                    require_once _DIR_ROOT."\\views\\".$controller.".php";
                    $data = getAllData("*","list_service");
                    print_r($data);
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>