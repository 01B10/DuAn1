<?php 
    $queryBuilder = new QueryBuilder();
    $listTour = $queryBuilder->query($queryBuilder->table("tour")->select("*")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->where("tour.province","=",$_GET["Province"])->where("tour.status_tour","=",1)
    ->get());

    $blogs = $queryBuilder->query($queryBuilder->table("blog")->select("*")->where("blog.province_id","=",$_GET["Province"])
    ->where("blog.status","=",2)
    ->get());

    $_SESSION["relatedTour"] = $_GET["Province"];

    $province = $queryBuilder->query($queryBuilder->table("province")->select("*")
    ->where("province.Id","=",$_GET["Province"])->get())[0];
?>

    <div class="container">
        <div class="tour">
            <h1>Tour <?php echo $province["name"]?></h1>
            <ul>
                <?php 
                    if(!empty($listTour)){
                        foreach($listTour as $item){
                            $discount = $item["price"] - $item["price"] * $item["discount"]/100;
                            $listTransport = $queryBuilder->query($queryBuilder->table("transport")->select("*")
                            ->join("inner","list_transport","transport.list_transport_id = list_transport.Id")
                            ->where("transport.tour_detail_id","=",$item["Id"])->get());
                            $day = $item["number_of_day"] - 1;
                ?>
                            <li>
                                <div class="box-img">
                                    <a href="tourDetail?tourdetailId=<?php echo $item["Id"]?>">
                                        <img src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>"><div class="note-special">Giá tốt nhất</div>
                                    </a>
                                </div>
                                <div class="box-content">
                                    <div class="box-content-promotion box-content-promotion-tour">
                                        <div class="box-title-content">
                                            <h3 class="title-h3">
                                                <a href="tourDetail?tourdetailId=<?php echo $item["Id"]?>">
                                                    <?php 
                                                        if($day > 0){
                                                            echo "{$item["name"]} {$item["number_of_day"]} ngày $day đêm | {$item["journeys"]}";
                                                        }else{
                                                            echo "{$item["name"]} {$item["number_of_day"]} ngày | {$item["journeys"]}";
                                                        }
                                                    ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="box-summary-content-tour">
                                            <table class="table tlb-time-and-traffic-tour">
                                                <tbody>
                                                    <tr class="timre-tour">
                                                        <td> Mã: <?php echo $item["tour_id"] ?></td>
                                                        <td> <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo "{$item["number_of_day"]} ngày $day đêm | {$item["journeys"]}" ?> </td>
                                                        <td> 
                                                            <?php 
                                                                foreach($listTransport as $transport){
                                                            ?>
                                                                    <img class="icon" src="<?php echo _WEB_ROOT_."/views/admin/icon/".$transport["img"]?>" alt="">
                                                            <?php
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Khởi Hành : <?php echo $item["departure"]?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="box-tour-note-extra"> </div>
                                        </div>
                                        <div class="box-price-promotion-tour">
                                            Giá 1 khách:  <span><?php echo number_format($discount)?><sup>đ</sup></span><del><?php echo number_format($item["price"])?><sup>đ</sup></del>
                                            <div class="box-percent-tour">
                                                <div class="arrow-left">
                                                    <div class="box-percent-tour-sale">-<?php echo $item["discount"]?>%</div>
                                                </div>
                                            </div>
                                            Còn: <?php echo $item["slot"]?> chỗ
                                            <a class="btn btn-success btn-xs btn-readmore" href="tourDetail?tourdetailId=<?php echo $item["Id"]?>">
                                                Chi tiết tour <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                <?php
                        }
                
                    }
                ?>

            </ul>
        </div>
        <div class="blogs">
            <?php 
                if(!empty($blogs) && !empty($listTour)){
            ?>
                <h2>Blogs</h2>
                <ul>
                    <?php 
                        foreach($blogs as $item){
                    ?>
                            <li>
                                <a href="blogdetails?Id=<?php echo $item["Id"]?>">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$item["img"]?>" alt="">
                                </a>
                                <a href="blogdetails?Id=<?php echo $item["Id"]?>">
                                    <p class="titleBlog"><?php echo $item["title"]?></p>
                                </a>
                                <p>
                                    <i class="fa-solid fa-calendar-plus"></i>
                                    <span><?php echo date_format(date_create($item["creat_time"]),"d-m-Y")?></span>
                                </p>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            <?php
                }
            ?>
        </div>
    </div>
