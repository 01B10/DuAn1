<?php 
    $queryBuilder = new QueryBuilder();
    $rule = [
        "img" => "img",
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
        "img.img" => "file không hợp lệ",
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

    $listTransport = $queryBuilder->query($queryBuilder->table("list_transport")->select("*")->get());
    $listService = $queryBuilder->query($queryBuilder->table("list_service")->select("*")->get());
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
    
    $errors = [];
    if(isset($_POST["addTour"])){
        $validate =  validate($rule,$message,$errors);
        $errors = errors("",$errors);

        if($validate){
            $service = $_POST["listservice_id"];
            $trasport = $_POST["list_transport_id"];
            $_POST["content_service"] = "\"".htmlentities($_POST["content_service"])."\"";
            $_POST["content_schedule"] = "\"".htmlentities($_POST["content_schedule"])."\"";
            
            unset($_POST["listservice_id"]);
            unset($_POST["list_transport_id"]);

            $_POST["start_time"] = date("Y-m-d",strtotime($_POST["start_time"]));
            $_POST["end_time"] = date("Y-m-d",strtotime($_POST["end_time"]));
            $data = array_filter($_POST);
            $data["img"] = $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"],_DIR_ROOT."/views/client/img/tours/".$data["img"]);

            $queryBuilder->excute($queryBuilder->inserData("tour",$data));

            $idTour = $queryBuilder->first($queryBuilder->table("tour")->select("Id")->orderBy("Id","DESC")->get());
            $queryBuilder->excute($queryBuilder->inserData("tour_detail",["tour_id"=>$idTour["Id"]]));
            $idTourDetail = $queryBuilder->first($queryBuilder->table("tour_detail")->select("Id")->orderBy("Id","DESC")->get());
            
            $data = [];
            $data["tour_detail_id"] = $idTourDetail["Id"];
            foreach($service as $item){
                $data["listservice_id"] = $item;
                $queryBuilder->excute($queryBuilder->inserData("service",$data));
            }

            $data = [];
            $data["tour_detail_id"] = $idTourDetail["Id"];
            foreach($trasport as $item){
                $data["list_transport_id"] = $item;
                $queryBuilder->excute($queryBuilder->inserData("transport",$data));
            }
            
            // echo "<script>alert('Đã thêm tour thành công!')</script>";
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
                            <h2>Add Tour</h2>
                            <div class="Tour">
                                <div class="ImgTour">
                                    <input type="file" name="img">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/default-image.jpg"?>" alt="">
                                    <h4>Ảnh</h4>
                                    <p class="err"><?php echo (!empty($errors) && array_key_exists("img",$errors))?$errors["img"]:false?></p>
                                </div>
                                <div class="infortour">
                                    <label for="">
                                        <span>Tên tour</span>
                                        <input type="text" name="name" value="<?php if(!empty($_POST["name"])){echo $_POST["name"];}?>">
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
                                                            <?php echo (!empty($_POST["province"]) && $item["Id"] == $_POST["province"])?"selected":false ?>><?php echo $item["name"]?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("province",$errors))?$errors["province"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Giá:</span>
                                        <input type="text" name="price" value="<?php if(!empty($_POST["price"])){echo $_POST["price"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("price",$errors))?$errors["price"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Thời gian khởi hành:</span>
                                        <input id="myID" name="start_time" placeholder="dd-mm-yyyy" value="<?php if(!empty($_POST["start_time"])){echo date_format(date_create($_POST["start_time"]),"d-m-y");}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("start_time",$errors))?$errors["start_time"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Hành trình:</span>
                                        <input type="text" name="journeys" value="<?php if(!empty($_POST["journeys"])){echo $_POST["journeys"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("journeys",$errors))?$errors["journeys"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Thời gian kết thúc:</span>
                                        <input id="myID" name="end_time" placeholder="dd-mm-yyyy" value="<?php if(!empty($_POST["end_time"])){echo date_format(date_create($_POST["end_time"]),"d-m-y");}?>">
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
                                                            <input type="checkbox" name="listservice_id[]" id="<?php echo $item["Id"]?>" class="toggleService toggle" value="<?php echo $item["Id"]?>"
                                                            <?php echo (!empty($_POST["listservice_id"]) && in_array($item["Id"],$_POST["listservice_id"]))?"checked":false ?>><span><?php echo $item["name"]?></span>
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
                                                            <?php if(!empty($_POST["list_transport_id"]) && in_array($item["Id"],$_POST["list_transport_id"])){echo "checked";}?>><span><?php echo $item["name"]?></span>
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
                                        <input type="text" name="departure" value="<?php if(!empty($_POST["departure"])){echo $_POST["slot"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("departure",$errors))?$errors["departure"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Chỗ:</span>
                                        <input type="text" name="slot" value="<?php if(!empty($_POST["slot"])){echo $_POST["slot"];}?>">
                                        <p class="err"><?php echo (!empty($errors) && array_key_exists("slot",$errors))?$errors["slot"]:false?></p>
                                    </label>
                                    <label for="">
                                        <span>Giảm giá:</span>
                                        <input type="text" name="discount" value="<?php if(!empty($_POST["discount"])){echo $_POST["discount"];}?>">
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

                        <button type="submit" name="addTour" class="btn btn-success waves-effect waves-light">Add Tour</button>
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
                contentService.innerHTML = `<?php if(!empty($_POST["content_service"])){echo html_entity_decode($_POST["content_service"]);}?>`;
                contentSchedule.innerHTML = `<?php if(!empty($_POST["content_schedule"])){echo html_entity_decode($_POST["content_schedule"]);}?>`;
            });
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </main>
</div>

