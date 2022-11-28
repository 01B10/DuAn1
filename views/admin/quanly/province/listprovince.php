<?php 
    $queryBuilder = new QueryBuilder();
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());

    $tours = $queryBuilder->query($queryBuilder->table("tour")->select("*")->get());

    if(isset($_GET["act"]) && $_GET["act"] == "deleteProvince"){
        if(!empty($tours)){
            $idTour = $queryBuilder->query($queryBuilder->table("tour")->select("Id")
            ->where("tour.province","=",$_GET["Id"])->get())[0];
            $idTourDetail = $queryBuilder->query($queryBuilder->table("tour_detail")->select("Id")
            ->where("tour_detail.tour_id","=",$idTour["Id"])->get())[0];
            $queryBuilder->excute($queryBuilder->delete("service","service.tour_detail_id = ".$idTourDetail["Id"]));
            $queryBuilder->excute($queryBuilder->delete("transport","transport.tour_detail_id = ".$idTourDetail["Id"]));
            $queryBuilder->excute($queryBuilder->delete("tour_detail","tour_detail.Id = ".$idTourDetail["Id"]));
            $idOrder = $queryBuilder->query($queryBuilder->table("order_details")->select("order_id")
            ->where("order_details.tour_id","=",$idTour["tour_id"])->get())[0];
            $queryBuilder->excute($queryBuilder->delete("order_details","order_details.tour_id = ".$idTour["Id"]));
            if(!empty($idOrder)){$queryBuilder->excute($queryBuilder->delete("ordertour","ordertour.Id = ".$idOrder["order_id"]));}
            $queryBuilder->excute($queryBuilder->delete("tour","tour.Id = ".$idTour["Id"]));
        }

        $queryBuilder->excute($queryBuilder->delete("blog","blog.province_id = ".$_GET["Id"]));
        $queryBuilder->excute($queryBuilder->delete("province","province.Id = ".$_GET["Id"]));
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tỉnh/Thành</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listProvince)){
                        $i = 0;
                        foreach($listProvince as $item){
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td>
                                    <img class="imgTour" src="<?php echo _WEB_ROOT_."/views/client/img/province/".$item["img"]?>" alt="">
                                </td>
                                <td><?php echo $item["name"]?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="?act=deleteProvince&Id=<?php echo $item["Id"]?>">Delete</a>
                                        <a href="updateProvince?Id=<?php echo $item["Id"]?>">Update</a>
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