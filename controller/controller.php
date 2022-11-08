<?php 
    function render($path,$data = []){
        extract($data);
        if(file_exists(_DIR_ROOT."\\views\\".$path.".php")){
            require_once _DIR_ROOT."\\views\\".$path.".php";
        }
    }
?>