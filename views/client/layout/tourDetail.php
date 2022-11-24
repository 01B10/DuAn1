<?php 
    $queryBuilder = new QueryBuilder();
    $tourDetail = $queryBuilder->query($queryBuilder->table("tour")->select("*")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->where("tour_detail.Id","=",$_GET["tourdetailId"])
    ->get());

    if(isset($_POST["orderTour"])){
        if(isset($_SESSION["Login"]["customer"])){
            $_SESSION["orderDate"] = $_POST["orderDate"];
            $_SESSION["tourdetailId"] = $_GET["tourdetailId"];
            header("Location: bookTour?tour_id=".$tourDetail[0]["tour_id"]);
        }else{
            header("Location: login");
        }
    }
?>


    <div class="container">
        <?php 
            if(!empty($tourDetail)){
                foreach($tourDetail as $item){
                    $listTransport = $queryBuilder->query($queryBuilder->table("transport")->select("*")
                    ->join("inner","list_transport","transport.list_transport_id = list_transport.Id")
                    ->where("transport.tour_detail_id","=",$item["Id"])->get());
                    $listService = $queryBuilder->query($queryBuilder->table("service")->select("*")
                    ->join("inner","list_service","service.listservice_id = list_service.Id")
                    ->where("service.tour_detail_id","=",$item["Id"])->get());
                    $startTime = strtotime($item["start_time"]);
                    $endTime = strtotime($item["end_time"]);
                    $day = date("d",$endTime - $startTime) - 1;
        ?>
                    <div class="gr-1">
                        <h1 class="title-tour">
                            <?php echo "{$item["name"]} $day ngày $day đêm | {$item["journeys"]}" ?>
                        </h1>
                        <iframe width="100%" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $item["journeys"]?>&amp;hl=es;z=14&amp;output=embed" allowfullscreen=""></iframe>
                        <!-- SlideShow -->
                        <div class="slideshow-container">

                            <div class="mySlides">
                              <img src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>" style="width:100%">
                            </div>

                        </div>
                          <br>

                        <table class="tlb-info-tour">
                            <tbody>
                                <tr>
                                   <td><i class="fa-solid fa-location-dot"></i>Địa ĐIểm: <?php echo $item["departure"]?></td>
                                   <td><i class="fa-regular fa-clock"></i>Time: <?php echo "$day ngày $day đêm"?></td>
                                   <td>Phương Tiện: 
                                        <?php 
                                            foreach($listTransport as $transport){
                                        ?>
                                                <img class="icon" src="<?php echo _WEB_ROOT_."/views/admin/icon/".$transport["img"]?>" alt="">
                                        <?php
                                            }
                                        ?>
                                   </td>
                                   <td class="code-tour">Mã Tour: <?php echo $item["tour_id"]?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-regular fa-calendar-days"></i>Khởi Hành: <?php echo date("d-m-Y",strtotime($item["start_time"]))?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>

                        <!--  -->
                        <div class="box-service-tour">
                            <h2>Dịch Vụ Theo Kèm</h2>
                            <ul class="list-extra-services">
                                    <?php 
                                            foreach($listService as $service){
                                    ?>
                                                <li>
                                                    <img class="iconService" src="<?php echo _WEB_ROOT_."/views/admin/icon/".$service["img"]?>" alt="">
                                                    <?php echo $service["name"]?>
                                                </li>
                                    <?php
                                            }
                                    ?>
                            </ul>
                        </div>

                        <div class="panel-group" id="tour-product">
                            <div class="panel-tour-product">
                                <div class="panel-tour-product-title">
                                    <h4>CHƯƠNG TRÌNH TOUR</h4>
                                    <i class="pull-right fa fa-chevron-down"></i>
                                </div>
                                <div class="panel-tour-product-content">
                                    <!-- lịch trình -->
                                    <?php 
                                        echo html_entity_decode($item["content_schedule"]);
                                    ?>
                                </div>
                            </div>
                            <div class="panel-tour-product">
                                <div class="panel-tour-product-title">
                                    <h4>DỊCH VỤ BAO GỒM</h4>
                                    <i class="pull-right fa fa-chevron-down"></i>
                                </div>
                                <div class="panel-tour-product-service">
                                    <!-- dịch vụ -->
                                    <?php 
                                        echo html_entity_decode($item["content_service"]);
                                    ?>
                                </div>

                            </div>

                        </div>
                        <div class="box-form-price-tour horizontal">    
                            <form action="" method="POST">
                                <table class="tlb-box-price-tour">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="price-tour">
                                                    <div class="title-price-old horizontal"><del>3,464,000 VND</del></div>
                                                    <div class="title-price-new">
                                                        2,390,000 <span class="title-price-new-slot">VND/người</span> 
                                                    </div>
                        
                                                </span>
                                            </td>
                                            <td>
                                                <label>Khởi hành</label><br>
                                                <input required="required" name="id" type="hidden">
                                                <input id="myID" name="orderDate" class="form-control" placeholder="dd/mm/yyyy" value="
                                                    <?php 
                                                        echo date("d/m/y",time());
                                                    ?>
                                                ">
                                            </td>
                                            <td>
                                                <button class="btn-submit-set-tour" name="orderTour" href="bookTour">Đặt Tour</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
        <?php
                }
            }
        ?>
    </div>

<script>
    let slideIndex = 0;
    var tourTitle = document.querySelectorAll('.panel-tour-product-title');
    var tour = document.querySelectorAll('.panel-tour-product');
    for(let i = 0; i < tourTitle.length; i++){
        tourTitle[i].onclick = function(){
        var tourHeight = tour[i].clientHeight;
        var isClosed = tourTitle[i].clientHeight === tourHeight;
        if(isClosed){
            tour[i].style.height = 'auto';
        } else {
            tour[i].style.height = null;
        }
    }
    }
    
</script>
