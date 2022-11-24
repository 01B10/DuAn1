<?php 
    $queryBuilder = new QueryBuilder();
    $listTour = $queryBuilder->query($queryBuilder->table("province")->select("*")
    ->join("right","tour","province.Id = tour.province")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->get());
    
    if(isset($_GET["act"]) && $_GET["act"] == "delete"){
        $idTour = $queryBuilder->query($queryBuilder->table("tour_detail")->select("tour_id")
        ->where("tour_detail.Id","=",$_GET["Id"])->get())[0];
        $idOrder = $queryBuilder->query($queryBuilder->table("order_details")->select("order_id")
        ->where("order_details.tour_id","=",$idTour["tour_id"])->get())[0];
        $queryBuilder->excute($queryBuilder->delete("service","service.tour_detail_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("transport","transport.tour_detail_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("tour_detail","tour_detail.Id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("order_details","order_details.tour_id = ".$idTour["tour_id"]));
        $queryBuilder->excute($queryBuilder->delete("ordertour","ordertour.Id = ".$idOrder["order_id"]));
        $queryBuilder->excute($queryBuilder->delete("tour","tour.Id = ".$idTour["tour_id"]));
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
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
                            $province = $queryBuilder->query($queryBuilder->table("province")->select("name")->where("province.id","=",$item["province"])->get())[0];
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["name"]?></td>
                                <td><img class="imgTour" src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>" alt=""></td>
                                <td>
                                    <p>Điểm khởi hành: <?php echo $province["name"]?></p>
                                    <p>Hành trình: <?php echo $item["journeys"]?></p>
                                    <p>Giảm giá: <?php echo $item["discount"]?></p>
                                    <p>Ngày bắt đầu: <?php echo $item["start_time"]?></p>
                                    <p>Ngày kết thúc: <?php echo $item["end_time"]?></p>
                                    <p>Chỗ: <?php echo $item["slot"]?></p>
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
                                        <a class="deleteTour" href="listTour?act=delete&Id=<?php echo $item["Id"]?>">Delete</a>
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