<?php 
    $queryBuilder = new QueryBuilder();
    $listservice = $queryBuilder->query($queryBuilder->table("list_service")->select("*")->get());
    if(isset($_POST["submit"])){
        $data["listservice_id"] = isset($_POST["service"])?implode("",$_POST["service"]):"";
        $data["tour_detail_id"] = 1;
        $data["content"] = htmlentities($_POST["content"]);
        $file = $_FILES["files"];
        echo "<pre>";
        print_r($_FILES["files"]);
        echo "</pre>";
        if(empty($file["name"])){
            $data["content"] = "'".htmlentities($_POST["content"])."'";
        }else{
            $src = explode("src=",$data["content"]);
            $content = "";
            for($i = 0; $i < count($_FILES["files"]["name"]); $i++){
                $src[$i+1] = trim($src[$i+1],"<img ");
                $subsrc = explode(" ",$src[$i+1]);
                $subsrc[0] = '"'._WEB_ROOT_."/views/admin/img/".$file["name"][$i].'"';
                $src[$i+1] = " src=";
                foreach($subsrc as $item){
                    $src[$i+1].= " ".$item." ";
                }
                if(strlen($src[0] == 8)){
                    $src[$i+1] = substr($src[$i+1],0,-5);
                    $content .= $src[0].$src[$i+1];
                }else{
                    $content .= $src[0].$src[$i+1];
                    $src[0] = "";
                }
            }
            $data["content"] = "'".$content."'";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <title>Newsportal | Add Post</title>
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/summernote.css"?>" rel="stylesheet" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/select2.min.css"?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/bootstrap.min.css"?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/core.css"?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo _WEB_ROOT_."/views/admin/assets/css/components.css"?>" rel="stylesheet" type="text/css" />
</head>


<body class="fixed-left">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="p-6">
                <div class="">
                    <form name="addpost" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group m-b-20"></div>

                        <div class="form-group m-b-20"></div>
    
                        <div class="form-group m-b-20"></div>

                        <div class="row">
                        <div class="infor">
                            <label for="">
                                <span>Danh sách dịch vụ: <br></span>
                                <?php 
                                    if(!empty($listservice)){
                                        foreach($listservice as $item){
                                ?>
                                    <input type="checkbox" name="service[]" value="<?php echo $item["Id"]?>"> <?php echo $item["name"]?> <br>
                                <?php
                                        }
                                    }
                                ?>
                            </label>
                        </div>
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                                    <textarea class="summernote" name="content" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box"></div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
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
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
            });
        </script>

        <script src="<?php echo _WEB_ROOT_."/views/admin/assets/js/summernote.js"?>"></script>
    </body>
</html>
