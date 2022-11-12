<?php
    $arrPath = explode("\\",__DIR__);
    $arrPath = array_slice($arrPath,0,4);
    $path = implode("\\",$arrPath);
    include_once $path."\model\sqldb.php";
    $queryBuilder = new QueryBuilder();
    $data["tour_id"] = 1;
    $data["cus_id"] = 1;
    $data["time"] = "'".date("d/m/Y",time())."'";
    $data["content"] = "'".$_POST["inputfield"]."'";
    echo $data["time"];
    echo $queryBuilder->inserData("comment",$data);
    $queryBuilder->excute($queryBuilder->inserData("comment",$data));
?>