<?php 
    include_once "./database/sqldb.php";
    $queryBuilder = new QueryBuilder();
    // echo $_POST["code"];
    $checkCoupon = $queryBuilder->query($queryBuilder->table("discount_code")->select("*")
    ->where("discount_code.code","=",$_POST["code"])->get());
    
    if(!empty($checkCoupon)){
       $re =  0;
    }else{
        $re =  1;
    }
    echo $re;
?>