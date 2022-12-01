<?php 
    $queryBuilder = new QueryBuilder();
    $listTour = $queryBuilder->query($queryBuilder->table("province")->select("*")
    ->join("right","tour","province.Id = tour.province")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->get());
    
    if(isset($_GET["act"]) && $_GET["act"] == "deleteTour"){
        $idTour = $queryBuilder->query($queryBuilder->table("tour_detail")->select("tour_id")
        ->where("tour_detail.Id","=",$_GET["Id"])->get())[0];
        $idOrder = $queryBuilder->query($queryBuilder->table("order_details")->select("order_id")
        ->where("order_details.tour_id","=",$idTour["tour_id"])->get())[0];
        $queryBuilder->excute($queryBuilder->delete("service","service.tour_detail_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("transport","transport.tour_detail_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("comment","comment.tour_id = ".$idTour["tour_id"]));
        $queryBuilder->excute($queryBuilder->delete("tour_detail","tour_detail.Id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("order_details","order_details.tour_id = ".$idTour["tour_id"]));
        if(!empty($idOrder)){$queryBuilder->excute($queryBuilder->delete("ordertour","ordertour.Id = ".$idOrder["order_id"]));}
        $queryBuilder->excute($queryBuilder->delete("tour","tour.Id = ".$idTour["tour_id"]));
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên tour</th>
                    <th>Hình ảnh</th>
                    <th>Thông tin</th>
                    <th>Dịch vụ</th>
                    <th>Phương tiện</th>
                    <th>Lịch trình</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listTour)){
                        $i = 0;
                        foreach($listTour as $item){
                            $i++;
                            $listService = $queryBuilder->query($queryBuilder->table("service")->select("*")
                            ->join("inner","list_service","service.listservice_id = list_service.Id")
                            ->where("service.tour_detail_id","=",$item["Id"])->get());
                            $listTransport = $queryBuilder->query($queryBuilder->table("transport")->select("*")
                            ->join("inner","list_transport","transport.list_transport_id = list_transport.Id")
                            ->where("transport.tour_detail_id","=",$item["Id"])->get());
                            $province = $queryBuilder->query($queryBuilder->table("province")->select("name")->where("province.id","=",$item["province"])
                            ->get())[0];
                            $discount = $item["price"] - $item["price"] * $item["discount"]/100;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["tour_id"]?></td>
                                <td><span class="highlight"><?php echo $item["name"]?></span></td>
                                <td><img class="imgTour" src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>" alt=""></td>
                                <td>
                                    <p><span class="highlight">Điểm khởi hành: </span><?php echo $province["name"]?></p>
                                    <p><span class="highlight">Hành trình: </span><?php echo $item["journeys"]?></p>
                                    <p><span class="highlight">Giảm giá: </span><?php echo $item["discount"]?>%</p>
                                    <p><span class="highlight">Giá: </span><?php echo number_format($item["price"])?>VND 
                                    -> <span class="discount"><?php echo number_format($discount)?>VD</span></p>
                                    <p><span class="highlight">Ngày bắt đầu: </span><?php echo date_format(date_create($item["start_time"]),"d-m-Y")?></p>
                                    <p><span class="highlight">Ngày kết thúc: </span><?php echo date_format(date_create($item["end_time"]),"d-m-Y")?></p>
                                    <p><span class="highlight">Số ngày diễn ra: </span><?php echo $item["number_of_day"]?></p>
                                    <p><span class="highlight">Chỗ: </span><?php echo $item["slot"]?></p>
                                </td>
                                <td>
                                    <?php 
                                        foreach($listService as $service){
                                    ?>
                                            <p><?php echo $service["name"]?></p>
                                    <?php
                                        }
                                    ?>
                                        <p class="content">Nội dung: <?php echo $item["content_service"]?></p>
                                </td>
                                <td>
                                    <?php 
                                        foreach($listTransport as $transport){
                                    ?>
                                            <p><?php echo $transport["name"]?></p>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <p class="content"><?php echo $item["content_schedule"]?></p>
                                </td>
                                
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a class="deleteTour" href="?act=deleteTour&Id=<?php echo $item["Id"]?>">Delete</a>
                                        <a href="updateTour?Id=<?php echo $item["Id"]?>">Update</a>
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