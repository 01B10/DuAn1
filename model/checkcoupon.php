<?php 
    include_once "./database/sqldb.php";
    $queryBuilder = new QueryBuilder();
    $checkDate = date("Y-m-d",time());
    $checkCoupon = $queryBuilder->query($queryBuilder->table("discount_code")->select("*")
    ->where("discount_code.code","=",$_POST["code"])
    ->where("discount_code.end_time",">=",$checkDate)
    ->get());
    
    if(!empty($checkCoupon)){
        echo $checkCoupon[0]["coupon_value"]."|".$checkCoupon[0]["type"];
    }else{
        echo 1;
    }
?>