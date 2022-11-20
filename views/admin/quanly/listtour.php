<?php 
    $queryBuilder = new QueryBuilder();
    $listTour = $queryBuilder->query($queryBuilder->table("province")->select("*")
    ->join("right","tour","province.Id = tour.province")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->join("inner","schedule","schedule.tour_detail_id = tour_detail.Id")
    ->get());
    // print_r($listTour);
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
                            ->where("service.tour_detail_id","=",$item["tour_detail_id"])->get());
                            $listTransport = $queryBuilder->query($queryBuilder->table("transport")->select("*")
                            ->join("inner","list_transport","transport.list_transport_id = list_transport.Id")
                            ->where("transport.tour_detail_id","=",$item["tour_detail_id"])->get());
                            $province = $queryBuilder->query($queryBuilder->table("province")->select("name")->where("province.id","=",$item["province"])->get())[0];
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["name"]?></td>
                                <td><img class="imgTour" src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>" alt=""></td>
                                <td>
                                    <p>Hành trình: <?php echo $province["name"]?></p>
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
                                    <?php echo $item["content_schedule"]?>
                                </td>
                                
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="">Delete</a>
                                        <a href="">Update</a>
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