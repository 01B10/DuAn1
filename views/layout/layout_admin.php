<?php 
    if(isset($_SESSION["Login"]["admin"])){
        render("admin/block/header",$sub1);
        render($sub);
        render("admin/block/footer");
    }else{
        header("Location: "._WEB_ROOT_);
    }
?>