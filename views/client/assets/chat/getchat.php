<?php 
    $arrPath = explode("\\",__DIR__);
    $arrPath = array_slice($arrPath,0,4);
    $path = implode("\\",$arrPath);
    include $path."\model\sqldb.php";
    $queryBuilder = new QueryBuilder();
    $data = $queryBuilder->query($queryBuilder->select("*")->table("comment")
    ->join("left","customer","comment.cus_id = customer.Id")
    ->where("comment.tour_id","=",$_POST["tour_id"])
    ->get());
    $ouput = "";
    foreach($data as $item){
        $ouput.="<p>".$item['content']."</p>";
    }
    echo $ouput;
    echo __DIR__;
?>