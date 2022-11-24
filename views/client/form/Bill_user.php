<?php 
     if(isset($_SESSION["Login"]["customer"])){
        $queryBuilder = new QueryBuilder();
         $order = $queryBuilder->query($queryBuilder->table("customer")->select("*")
        ->join("inner","ordertour","customer.Id = ordertour.cus_id")
        ->join("inner","order_details","ordertour.Id = order_details.order_id")
        ->join("inner","tour","order_details.tour_id = tour.Id")
        ->where("customer.Id","=",$_SESSION["Login"]["customer"]["Id"])->orderBy("tour.Id","DESC")
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
                <th>Thời gian đặt</th>
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
                            $startTime = strtotime($item["start_time"]);
                            $endTime = strtotime($item["end_time"]);
                            $day = date("d",$endTime - $startTime) - 1;
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
                                            echo "{$item["name"]} $day ngày $day đêm | {$item["journeys"]}";
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
                                        echo $item["creat_time"];
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
                                        echo $item["start_time"];
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
                                    <span>
                                        <?php 
                                            echo $item["total"];
                                        ?>đ
                                    </span>
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