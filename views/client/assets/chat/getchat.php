<?php 
    $arrPath = explode("\\",__DIR__);
    $arrPath = array_slice($arrPath,0,4);
    $path = implode("\\",$arrPath);
    include $path."\model\sqldb.php";
    $queryBuilder = new QueryBuilder();
    $data = $queryBuilder->query($queryBuilder->select("*")->table("comment")->get());
    $ouput = "";
    foreach($data as $item){
        $ouput.="<p>".$item['content']."</p>";
    }
    echo $ouput;
?>