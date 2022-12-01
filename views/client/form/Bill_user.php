<?php 
     if(isset($_SESSION["Login"]["customer"])){
        $queryBuilder = new QueryBuilder();
         $order = $queryBuilder->query($queryBuilder->table("customer")->select("*")
        ->join("inner","ordertour","customer.Id = ordertour.cus_id")
        ->join("inner","order_details","ordertour.Id = order_details.order_id")
        ->join("inner","tour","order_details.tour_id = tour.Id")
        ->where("customer.Id","=",$_SESSION["Login"]["customer"]["Id"])->orderBy("order_id","DESC")
        ->get());
        $status = $queryBuilder->query($queryBuilder->table("status")->select("*")->get());
     }else{
        header("Location: Trang-Chu");
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/Bill_user.css"?>">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="Trang-Chu">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <main>
        <h2>Hóa đơn</h2>
        <table cellpadding="10" >
            <thead>
                <th>STT</th>
                <th>ID</th>
                <th>Tên tour</th>
                <th>Tên khách hàng</th>
                <th>Thời gian tạo</th>
                <th>Số người lớn</th>
                <th>Số trẻ em</th>
                <th>Ngày khởi hành</th>
                <th>Điểm khởi hành</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </thead>
            <tbody>
                <?php 
                    if(!empty($order)){
                        $i = 0;
                        foreach($order as $item){
                            $i++;
                            $day = $item["number_of_day"] - 1;
                            $coupon = $queryBuilder->query($queryBuilder->table("discount_code")->select("Id,type,coupon_value")
                            ->where("discount_code.Id","=",$item["discount_id"])->get());

                            if(!empty($coupon)){
                                $discountTour = ($coupon[0]["type"] == 2)?($item["total"] - $item["total"] * $coupon[0]["coupon_value"]/100):$item["total"] - $coupon[0]["coupon_value"];
                            }
                ?>
                            <tr>
                                <td>
                                        <?php 
                                            echo $i;
                                        ?>
                                </td>
                                <td>
                                        <?php 
                                            echo $item["order_id"];
                                        ?>
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            echo "{$item["name"]} {$item["number_of_day"]} ngày $day đêm | {$item["journeys"]}";
                                        ?>
                                    </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                   <span>
                                        <?php 
                                            echo $_SESSION["Login"]["customer"]["name"];
                                        ?>
                                   </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <?php 
                                        echo date_format(date_create($item["creat_time"]),"d-m-Y");
                                    ?>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            echo $item["adults"];
                                        ?>
                                    </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            echo $item["children"];
                                        ?>
                                    </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <?php 
                                        echo date_format(date_create($item["start_time_order"]),"d-m-Y");
                                    ?>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            echo $item["departure"];
                                        ?>
                                    </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                        <?php 
                                            if(!empty($coupon)){
                                                $discountTour = ($coupon[0]["type"] == 2)?($item["total"] - $item["total"] * $coupon[0]["coupon_value"]/100):$item["total"] - $coupon[0]["coupon_value"];
                                                echo "<p><del>".number_format($item["total"])."VND</del></p>";
                                                echo "<p>".number_format($discountTour)."VND</p>";
                                                
                                            }else{
                                                echo number_format($item["total"])."VND";
                                            }
                                        ?>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            if($item["pay"] == 1){
                                                echo "Tại văn phòng";
                                            }elseif($item["pay"] == 2){
                                                echo "Tận nơi";
                                            }else{
                                                echo "Chuyển khoản";
                                            }
                                        ?>
                                    </span>
                                    <!-- php code -->
                                </td>
                                <td>
                                    <?php 
                                        foreach($status as $itemStatus){
                                            if($itemStatus["Id"] == $item["status_id"]){
                                                echo "<button type='button' class='statusOrder'>".$itemStatus["name"]."</button>";
                                            }else{
                                                echo "<button type='button' class='statusOrder' style='display: none'>".$itemStatus["name"]."</button>";
                                            }
                                        }
                                    ?>
                                    <!-- php code -->
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>