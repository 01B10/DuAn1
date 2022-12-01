<?php 
    include_once "./database/sqldb.php";
    
    $queryBuilder = new QueryBuilder();
    $arr = explode("|",$_POST["infor"]);
    $data = $queryBuilder->query($queryBuilder->select("*")->table("comment")
    ->join("left","customer","comment.cus_id = customer.Id")
    ->where("comment.tour_id","=",$arr[0])->orderBy("comment.time","DESC")
    ->get());
    $ouput = "";
    foreach($data as $item){
        $ouput.='<div class="comment">
                    <div class="avarta">
                        <img src="'.$arr[1].'/views/client/img/customer/'.$item["img"].'" alt="">
                    </div>
                    <div class="boxComment">
                        <div class="contentComment">
                            <p class="name">'.$item["name"].'</p>
                            <p class="content">'.$item["content"].'</p>
                        </div>
                        <small>'.date_format(date_create($item["time"]),"h:i:s d-m-Y").'</small>
                    </div>
                </div>';
    }
    echo $ouput;
?>