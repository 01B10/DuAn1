<?php 
    $queryBuilder = new QueryBuilder();
    $order = $queryBuilder->query($queryBuilder->table("customer")->select("*")
    ->join("inner","ordertour","customer.Id = ordertour.cus_id")
    ->join("inner","order_details","ordertour.Id = order_details.order_id")
    ->join("inner","tour","order_details.tour_id = tour.Id")->orderBy("order_id","DESC")->get());
    $status = $queryBuilder->query($queryBuilder->table("status")->select("*")->get());
    $customer = $queryBuilder->query($queryBuilder->table("customer")->select("*")->get());
    
    if(isset($_GET["orderId"]) && isset($_GET["statusId"])){
        $updateStatus = $queryBuilder->excute($queryBuilder->updateData("ordertour",["status_id"=>$_GET["statusId"]],"ordertour.Id = ".$_GET["orderId"]));
        if($_GET["statusId"] == 4 || $_GET["statusId"] == 5){
            $orderDetails = $queryBuilder->query($queryBuilder->table("order_details")->select("*")
            ->where("order_details.order_id","=",$_GET["orderId"])->get())[0];
            $returnSlot = $orderDetails["adults"] + $orderDetails["children"];
            $tour = $queryBuilder->query($queryBuilder->table("tour")->select("slot")->where("tour.Id","=",$orderDetails["tour_id"])->get())[0];
            $queryBuilder->excute($queryBuilder->updateData("tour",[
                "slot"=> $tour["slot"] + $returnSlot
            ],"tour.Id = ".$orderDetails["tour_id"]));
        }
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên tour</th>
                    <th>Thông tin khách hàng</th>
                    <th>Dữ liệu tour</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
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
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["order_id"]?></td>
                                <td>
                                        <?php 
                                            echo "{$item["name"]} {$item["number_of_day"]} ngày $day đêm | {$item["journeys"]}";
                                        ?></td>
                                <td>
                                    <p><span class="highlight">Tên: </span>
                                        <?php 
                                            foreach($customer as $cus){
                                                if ($cus["Id"] == $item["cus_id"]) {
                                                    echo $cus["name"];
                                                }
                                            }
                                        ?>
                                    </p>
                                    <p><span class="highlight">Email: </span><?php echo $item["email"]?></p>
                                    <p><span class="highlight">Phone: </span><?php echo $item["phone"]?></p>
                                </td>
                                <td>
                                    <p><span class="highlight">Ngày đi dự kiến: </span><?php echo date_format(date_create($item["start_time_order"]),"d-m-Y")?></p>
                                    <p><span class="highlight">Số người lớn: </span><?php echo $item["adults"]?></p>
                                    <p><span class="highlight">Số trẻ em: </span><?php echo $item["children"]?></p>
                                    <p><span class="highlight">Tổng tiền: </span><?php echo number_format($item["total"])?>VND</p>
                                    <?php 
                                        if(!empty($coupon)){
                                            $discountTour = ($coupon[0]["type"] == 2)?($item["total"] - $item["total"] * $coupon[0]["coupon_value"]/100):$item["total"] - $coupon[0]["coupon_value"];
                                            echo "<p><span class='highlight discount'>Giảm giá: </span>".number_format($discountTour)."VND</p>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($item["pay"] == 1){
                                            echo "Tại văn phòng";
                                        }elseif($item["pay"] == 2){
                                            echo "Tận nơi";
                                        }else{
                                            echo "Chuyển khoản";
                                        }
                                    ?>
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
                                </td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <?Php 
                                            foreach($status as $itemStatus){
                                                if($itemStatus["Id"] != 1){
                                        ?>
                                                    <a href="<?php echo "?orderId=".$item["order_id"]."&statusId=".$itemStatus["Id"]?>"><?php echo $itemStatus["name"]?></a>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
</div>