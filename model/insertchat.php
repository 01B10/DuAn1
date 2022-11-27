<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include_once "./database/sqldb.php";
    $queryBuilder = new QueryBuilder();
    unset($_POST["WeebRoot"]);
    $_POST["time"] = date("Y/m/d h:i:s",time());
    if(!empty($_POST["content"])){
        $queryBuilder->excute($queryBuilder->inserData("comment",$_POST));
    }
?>