<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $queryBuilder = new QueryBuilder();

    $tourDetail = $queryBuilder->query($queryBuilder->table("tour")->select("*")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->where("tour_detail.Id","=",$_GET["tourdetailId"])
    ->get());

    $relatedTour = $queryBuilder->query($queryBuilder->table("tour")->select("*")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->where("tour.province","=",$_SESSION["relatedTour"])
    ->where("tour_detail.Id","!=",$_GET["tourdetailId"])
    ->get());

    $startTime_search = isset($_SESSION["startTime_search"])?$_SESSION["startTime_search"]:"";

    if(isset($_POST["orderTour"])){
        if(isset($_SESSION["Login"]["customer"])){
            $_SESSION["orderDate"] = $_POST["orderDate"];
            $_SESSION["tourdetailId"] = $_GET["tourdetailId"];
            header("Location: bookTour?tour_id=".$tourDetail[0]["tour_id"]);
        }else{
            header("Location: login");
        }
    }

    if(isset($_POST["sendbtn"])){
        if(!isset($_SESSION["Login"]["customer"])){
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
                    $day = $item["number_of_day"] - 1;
                    $discount = $item["price"] - $item["price"] * $item["discount"]/100;
        ?>
                    <div class="gr-1">
                        <h1 class="title-tour">
                            <?php echo "{$item["name"]} {$item["number_of_day"]} ng??y $day ????m | {$item["journeys"]}" ?>
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
                                   <td><i class="fa-solid fa-location-dot"></i>?????a ??I???m: <?php echo $item["departure"]?></td>
                                   <td><i class="fa-regular fa-clock"></i>Time: <?php echo "{$item["number_of_day"]} ng??y $day ????m"?></td>
                                   <td>Ph????ng Ti???n: 
                                        <?php 
                                            foreach($listTransport as $transport){
                                        ?>
                                                <img class="icon" src="<?php echo _WEB_ROOT_."/views/admin/icon/".$transport["img"]?>" alt="">
                                        <?php
                                            }
                                        ?>
                                   </td>
                                   <td class="code-tour">M?? Tour: <?php echo $item["tour_id"]?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-regular fa-calendar-days"></i>Kh???i H??nh: <?php echo date("d-m-Y",strtotime($item["start_time"]))?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>

                        <!--  -->
                        <div class="box-service-tour">
                            <h2>D???ch V??? Theo K??m</h2>
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
                                    <h4>CH????NG TR??NH TOUR</h4>
                                    <i class="pull-right fa fa-chevron-down"></i>
                                </div>
                                <div class="panel-tour-product-content">
                                    <!-- l???ch tr??nh -->
                                    <?php 
                                        echo html_entity_decode($item["content_schedule"]);
                                    ?>
                                </div>
                            </div>
                            <div class="panel-tour-product">
                                <div class="panel-tour-product-title">
                                    <h4>D???CH V??? BAO G???M</h4>
                                    <i class="pull-right fa fa-chevron-down"></i>
                                </div>
                                <div class="panel-tour-product-service">
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
                                                    <div class="title-price-old horizontal"><del><?php echo number_format($item["price"])?>VND</del></div>
                                                    <div class="title-price-new">
                                                        <?php echo number_format($discount)?>VND<span class="title-price-new-slot">VND/ng?????i</span> 
                                                    </div>
                                                </span>
                                            </td>
                                            <td>
                                                <label>Kh???i h??nh</label><br>
                                                <input required="required" name="id" type="hidden">
                                                <input id="myID" name="orderDate" class="form-control" placeholder="dd/mm/yyyy" value="
                                                    <?php 
                                                        if(isset($startTime_search)){
                                                            echo date_format(date_create($startTime_search),"d-m-y");
                                                        }else{
                                                            echo date("d/m/y",time());
                                                        }
                                                    ?>
                                                ">
                                            </td>
                                            <td>
                                                <button class="btn-submit-set-tour" name="orderTour" href="bookTour">?????t Tour</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="formComment">
                            <form action="" class="typearea" method="POST">
                                <input type="text" name="cus_id" class="incoming_id" value="<?php if(isset($_SESSION["Login"]["customer"]["Id"])){echo $_SESSION["Login"]["customer"]["Id"];}?>" id="" hidden>
                                <input type="text" name="tour_id" class="incoming_id" value="<?php echo $tourDetail[0]["tour_id"]; ?>" id="" hidden>
                                <input type="text" name="WeebRoot" class="incoming_id" value="<?php echo _WEB_ROOT_;?>" id="" hidden>
                                <textarea name="content" class="inputfield" rows="10" placeholder="Vi???t b??nh lu???n...."></textarea>
                                <input class="sendbtn" name="sendbtn" type="<?php echo isset($_SESSION["Login"]["customer"]["Id"])?"button":"submit"?>" value="send">
                            </form>
                            <div class="chat-box"></div>
                        </div>
                        <h4>C??c tour li??n quan</h4>
                        <div class="pay-tour">
                            <?php 
                                if(!empty($relatedTour)){
                                    foreach($relatedTour as $item){
                                        $listTransport = $queryBuilder->query($queryBuilder->table("transport")->select("*")
                                        ->join("inner","list_transport","transport.list_transport_id = list_transport.Id")
                                        ->where("transport.tour_detail_id","=",$item["Id"])->get());
                                        $day = $item["number_of_day"] - 1;
                                        $discount = $item["price"] - $item["price"] * $item["discount"]/100;
                            ?>
                                        <div class="pay-tour__item">
                                            <a href="tourDetail?tourdetailId=<?php echo $item["Id"]?>">
                                                <img src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$item["img"]?>" alt="">
                                            </a>
                                            <a href="tourDetail?tourdetailId=<?php echo $item["Id"]?>" class="pay-tour__title">
                                                <h3><?php echo "{$item["name"]} {$item["number_of_day"]} ng??y $day ????m | {$item["journeys"]}"?></h3>
                                            </a>
                                            <p class="pay-tour__time">
                                                <span><i class="fa-regular fa-clock"></i> <?php echo "{$item["number_of_day"]} ng??y $day ????m"?></span>
                                                <span>
                                                <?php 
                                                    foreach($listTransport as $transport){
                                                ?>
                                                    <img class="icon" src="<?php echo _WEB_ROOT_."/views/admin/icon/".$transport["img"]?>" alt="">
                                                <?php
                                                    }
                                                ?>
                                                </span>
                                            </p>
                                            <p><i class="fa-solid fa-location-dot"></i> <?php echo $item["departure"]?></p>
                                            <p>C??n: <?php echo $item["slot"]?> ch???</p>
                                            <p class="pay-tour__price"><span><?php echo number_format($discount)?></span><span>-<?php echo $item["discount"]?>%</span></p>
                                            <p class="pay-tour__price"><del><?php echo number_format($item["price"])?></del></p>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
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
    var form = document.querySelector(".typearea");
    var sendbtn = document.querySelector(".sendbtn");
    var inputfield = document.querySelector(".inputfield");
    var chatBox = document.querySelector(".chat-box");
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


    if(sendbtn != null){
        sendbtn.addEventListener("click",()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST","model/insertchat.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                inputfield.value = "";
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
        });
    }
    
    setInterval(() => {
    	let xhr = new XMLHttpRequest();
    	xhr.open("POST", "model/getchat.php", true);
    	xhr.onload = () => {
    		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                    if(chatBox != null){
                        chatBox.innerHTML = xhr.response;
                    }
    		}
    	}
    	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xhr.send('infor='+<?php echo $tourDetail[0]["tour_id"]?>+"|"
        +'<?php echo _WEB_ROOT_?>');
    }, 800)
    
</script>
