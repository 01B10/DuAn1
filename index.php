<?php 
    include_once "./ap.php";
    if(isset($controller)){
        switch ($controller) {
            case $controller:
                if (file_exists(_DIR_ROOT."\\views\\".$controller.".php")) {
                    require_once _DIR_ROOT."\\views\\".$controller.".php";
                    if(!empty($_GET)){
                        echo "<pre>";
                        print_r($_GET);
                        echo "</pre>";
                    }
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>