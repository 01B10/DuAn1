<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $queryBuilder = new QueryBuilder();
    $rule = [
        "name" => "required|min:10|max:30",
        "departure" => "required",
        "province" => "required",
        "price" => "required|number",
        "start_time" => "required",
        "end_time" => "required",
        "journeys" => "required",
        "listservice_id" => "required",
        "list_transport_id" => "required",
        "slot" => "required|number",
        "discount" => "required|discount",
    ];

    $message = [
        "name.required" => "Không được để trống",
        "name.min" => "name phải có ít nhất 10 kí tự",
        "name.max" => "name không vượt quá 30 kí tự",
        "departure.required" => "Không được để trống",
        "province.required" => "Không được để trống",
        "price.required" => "không được để trống",
        "price.number" => "price không hợp lệ",
        "start_time.required" => "Không được để trống",
        "end_time.required" => "Không được để trống",
        "journeys.required" => "Không được để trống",
        "listservice_id.required" => "Không được để trống",
        "list_transport_id.required" => "Không được để trống",
        "slot.required" => "Không được để trống",
        "slot.number" => "slot không hợp lệ",
        "discount.required" => "Không được để trống",
        "discount.discount" => "discount không hợp lệ",
    ];

    $tour = $queryBuilder->query($queryBuilder->table("province")->select("*")
    ->join("right","tour","province.Id = tour.province")
    ->join("inner","tour_detail","tour.Id = tour_detail.tour_id")
    ->where("tour_detail.Id","=",$_GET["Id"])
    ->get())[0];

    $transportItem = $queryBuilder->query($queryBuilder->table("transport")->select("list_transport_id")
    ->where("transport.tour_detail_id","=",$_GET["Id"])->get());

    $serviceItem = $queryBuilder->query($queryBuilder->table("service")->select("listservice_id")
    ->where("service.tour_detail_id","=",$_GET["Id"])->get());


    $transportId = [];

    foreach($transportItem as $item){
        array_push($transportId,$item["list_transport_id"]);
    }

    $serviceId = [];
    foreach($serviceItem as $item){
        array_push($serviceId,$item["listservice_id"]);
    }
    

    $listTransport = $queryBuilder->query($queryBuilder->table("list_transport")->select("*")->get());
    $listService = $queryBuilder->query($queryBuilder->table("list_service")->select("*")->get());
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
    
    $errors = [];
    if(isset($_POST["updateTour"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);
        if($validate){
            $service = $_POST["listservice_id"];
            $trasport = $_POST["list_transport_id"];
            $_POST["content_service"] = htmlentities($_POST["content_service"]);
            $_POST["content_schedule"] = htmlentities($_POST["content_schedule"]);
            
            unset($_POST["listservice_id"]);
            unset($_POST["list_transport_id"]);

            $_POST["start_time"] = date("Y-m-d",strtotime($_POST["start_time"]));
            $_POST["end_time"] = date("Y-m-d",strtotime($_POST["end_time"]));
            $data = array_filter($_POST);
            if(empty($_FILES["img"]["name"])){
                $data["img"] = $tour["img"];
            }else{
                $data["img"] = $_FILES["img"]["name"];
            }
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/tours/".$data["img"]);

            $queryBuilder->excute($queryBuilder->updateData("tour",$data,"tour.Id = ".$tour["tour_id"]));
            
            $data = [];
            $data["tour_detail_id"] = $tour["Id"];
            $queryBuilder->excute($queryBuilder->delete("service","service.tour_detail_id = ".$tour["Id"]));
            foreach($service as $item){
                $data["listservice_id"] = $item;
                $queryBuilder->excute($queryBuilder->inserData("service",$data));
            }

            $data = [];
            $data["tour_detail_id"] = $tour["Id"];
            $queryBuilder->excute($queryBuilder->delete("transport","transport.tour_detail_id = ".$tour["Id"]));
            foreach($trasport as $item){
                $data["list_transport_id"] = $item;
                $queryBuilder->excute($queryBuilder->inserData("transport",$data));
            }
        }
    }

    
?>    

<main>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="p-6">
                <div class="">
                    <form class="addtour" name="addpost" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group m-b-20"></div>

                        <div class="form-group m-b-20"></div>
    
                        <div class="form-group m-b-20"></div>

                        <div class="row">
                        <div class="infor">
                            <h2>Update Tour</h2>
                            <div class="Tour">
                                <div class="ImgTour">
                                    <input type="file" name="img">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/tours/".$tour["img"]?>" alt="">
                                    <h4>Ảnh</h4>
                                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                                </div>
                                <div class="infortour">
                                    <label for="">
                                        <span>Tên tour</span>
                                        <input type="text" name="name" value="<?php if(!empty($_POST["name"])){echo $_POST["name"];}
                                        elseif(!empty($tour["name"])){echo $tour["name"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("name",$errors))?$errors["name"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Tỉnh thành:</span>
                                        <select name="province">
                                            <option value="" selected disabled>--Chọn tỉnh thành--</option>
                                            <?php 
                                                if(!empty($listProvince)){
                                                    foreach($listProvince as $item){
                                            ?>
                                                        <option value="<?php echo $item["Id"]?>" 
                                                            <?php echo ($item["Id"] == $tour["province"])?"selected":false ?>><?php echo $item["name"]?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("province",$errors))?$errors["province"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Giá:</span>
                                        <input type="text" name="price" value="<?php if(!empty($_POST["price"])){echo $_POST["price"];}
                                        elseif(!empty($tour["price"])){echo $tour["price"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("price",$errors))?$errors["price"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Thời gian khởi hành:</span>
                                        <input id="myID" name="start_time" placeholder="dd-mm-yyyy" value="<?php if(!empty($tour["start_time"])){echo date_format(date_create($tour["start_time"]),"d-m-y");}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("start_time",$errors))?$errors["start_time"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Hành trình:</span>
                                        <input type="text" name="journeys" value="<?php if(!empty($_POST["journeys"])){echo $_POST["journeys"];}
                                        elseif(!empty($tour["journeys"])){echo $tour["journeys"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("journeys",$errors))?$errors["journeys"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Thời gian kết thúc:</span>
                                        <input id="myID" name="end_time" placeholder="dd-mm-yyyy" value="<?php if(!empty($tour["end_time"])){echo date_format(date_create($tour["end_time"]),"d-m-y");}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("end_time",$errors))?$errors["end_time"]:false?></p>
                                    </label>
                                    <label for="" class="listservice">
                                        <span>Dịch vụ:</span>
                                        <div class="option">
                                            <?php 
                                                if(!empty($listService)){
                                                    foreach($listService as $item){
                                            ?>
                                                        <label for="<?php echo $item["Id"]?>">
                                                            <input type="checkbox" name="listservice_id[]" id="<?php echo $item["Id"]?>" class="toggleService toggle" 
                                                            value="<?php echo $item["Id"]?>" <?php if(in_array($item["Id"],$serviceId)){echo "checked";}?>><span><?php echo $item["name"]?></span>
                                                        </label>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("listservice_id",$errors))?$errors["listservice_id"]:false?></p>
                                    </label>
                                    <label for="" class="listservice">
                                        <span>Phương tiện:</span>
                                        <div class="option">
                                            <?php 
                                                if(!empty($listTransport)){
                                                    foreach($listTransport as $item){
                                            ?>
                                                        <label for="<?php echo $item["Id"]?>">
                                                            <input type="checkbox" name="list_transport_id[]" id="<?php echo $item["Id"]?>" class="toggleService toggle" value="<?php echo $item["Id"]?>"
                                                            <?php if(in_array($item["Id"],$transportId)){echo "checked";}?>
                                                            ><span><?php echo $item["name"]?></span>
                                                        </label>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("list_transport_id",$errors))?$errors["list_transport_id"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Điểm khởi hành:</span>
                                        <input type="text" name="departure" value="<?php if(!empty($_POST["departure"])){echo $_POST["departure"];}
                                        elseif(!empty($tour["departure"])){echo $tour["departure"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("departure",$errors))?$errors["departure"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Chỗ:</span>
                                        <input type="text" name="slot" value="<?php if(!empty($_POST["slot"])){echo $_POST["slot"];}
                                        elseif(!empty($tour["slot"])){echo $tour["slot"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("slot",$errors))?$errors["slot"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Giảm giá:</span>
                                        <input type="text" name="discount" value="<?php if(!empty($_POST["discount"])){echo $_POST["discount"];}
                                        elseif(!empty($tour["discount"])){echo $tour["discount"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("discount",$errors))?$errors["discount"]:false?></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Nội dung dịch vụ</b></h4>
                                <textarea class="summernote content_service" name="content_service"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Lịch trình</b></h4>
                                <textarea class="summernote content_schedule" name="content_schedule"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box"></div>
                            </div>
                        </div>

                        <button type="submit" name="updateTour" class="btn btn-success waves-effect waves-light">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            var resizefunc = [];
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/jquery.min.js"?>"></script>
        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/bootstrap.min.js"?>"></script>
        <script>
            jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                var contentService = document.querySelector(".content_service + .note-editor .note-editable");
                var contentSchedule = document.querySelector(".content_schedule + .note-editor .note-editable");
                contentService.innerHTML = `<?php echo html_entity_decode($tour["content_service"])?>`;
                contentSchedule.innerHTML = `<?php echo html_entity_decode($tour["content_schedule"])?>`;
            });

        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </main>
</div>

