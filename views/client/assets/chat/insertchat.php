<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $arrPath = explode("\\",__DIR__);
    $arrPath = array_slice($arrPath,0,4);
    $path = implode("\\",$arrPath);
    include_once $path."\model\sqldb.php";
    $queryBuilder = new QueryBuilder();
    $queryBuilder->excute($queryBuilder->inserData("comment",$_POST));
    // header("Location: Login");
    // print_r($_POST);
?>