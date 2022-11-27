<?php 
     $queryBuilder = new QueryBuilder();
     $rule = [
        "adults" => "required",
        "children" => "required",
    ];

    $message = [
        "adults.required" => "Không được để trống",
        "children.required" => "Không được để trống",
    ];
    
    $errors = [];
    $customer = $queryBuilder->query($queryBuilder->table("customer")->select("*")
    ->where("customer.Id","=",$_SESSION["Login"]["customer"]["Id"])->get())[0];
    $tour = $queryBuilder->query($queryBuilder->table("tour")->select("*")
    ->where("tour.Id","=",$_GET["tour_id"])->get())[0];

     if(isset($_POST["submit"])){
        $validate =  validate($rule,$message,$errors);
        if($validate){
            $adults = $_POST["adults"];
            $children = $_POST["children"];
            $pay = $_POST["pay"];
            unset($_POST["adults"]);
            unset($_POST["children"]);
            unset($_POST["pay"]);
            $data = array_filter($_POST);
            $data["total"] = ($adults * $tour["price"]) + ( $children * 0.8 * $tour["price"]);
            $data["cus_id"] = $_SESSION["Login"]["customer"]["Id"];
            $data["start_time"] = date("Y-m-d",strtotime($_SESSION["orderDate"]));
            $data["creat_time"] = date("Y-m-d");
            
            if($tour["slot"] < $adults + $children){
              echo "<script>alert('Hiện tại tour chỉ có: ".$tour["slot"]." chỗ')</script>";
            }else{
                    $currentSlot = $tour["slot"] - $adults - $children;
                    $queryBuilder->excute($queryBuilder->inserData("ordertour",$data));
                    
                    $orderID = $queryBuilder->first($queryBuilder->table("ordertour")->select("Id")->orderBy("Id","DESC")->get());
                    
                    $data = [];
                    $data["adults"] = $adults;
                    $data["children"] = $children;
                    $data["pay"] = $pay;
                    $data["tour_id"] = $_GET["tour_id"];
                    $data["order_id"] = $orderID["Id"];
                    
                    $insertOrder = $queryBuilder->excute($queryBuilder->inserData("order_details",$data));
                    $queryBuilder->excute($queryBuilder->updateData("tour",["tour.slot"=>$currentSlot],"tour.Id = ".$_GET["tour_id"]));
                    header("Location: bills");
              }
         }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_ . "/views/client/assets/css/inforBook.css" ?>">
    <script src="https://kit.fontawesome.com/d620f19a29.js" crossorigin="anonymous"></script>
    <title>bookTour</title>
</head>
<body>
    <!-- Responsive Contact Page with Dark Mode and Form Validation (vanilla JS).

*Designed & built for desktop and tablets with viewport width >= 720px and in landscape orientation.  -->
<a href="<?php echo "tourDetail?tourdetailId=".$_SESSION["tourdetailId"]?>">
        <i class="fa-solid fa-arrow-left"></i>
</a>
<div class="contact-container">
    <div class="left-col">
    </div>
    <div class="right-col">
      
        <h2 class="title-book-tour">Thông tin liên hệ</h2>      
        <form id="contact-form" method="POST">
            <!-- Fullname -->
            <label for="name">Full name</label>
            <input type="text" id="name" placeholder="Họ và tên..." value="<?php echo $customer["name"]?>" readonly>
            <!-- SDT -->
            <label for="name">Điện Thoại</label>
            <input type="text" id="phone" placeholder="SĐT..." value="<?php echo $customer["phone"]?>" readonly>
            <!-- Email -->
            <label for="email">Email Address</label>
            <input type="email" id="email" placeholder="Email..." value="<?php echo $customer["email"]?>" readonly>
            <!-- So luong nguoi lon -->
            <label for="name">Số lượng người lớn</label>
            <input type="number" id="number-elder" name="adults" placeholder="Number..." required>
            <!-- So luong tre em -->
            <label for="name">Số lượng trẻ em</label>
            <input type="number" id="number-child" name="children" placeholder="Number..." required>

            <!-- Thanh Toán -->
            <div class="box-change-type-payment">
                <h3 style="margin-bottom: 1rem;">Phương thức thanh toán</h3>
                <label for="rad-van-phong" class="vp">
                    <span class="al">Thanh toán tại văn phòng </span> 
                <input data-role="none" checked="checked" id="rad-van-phong" type="radio" name="pay" value="1">
                </label>
                <label for="rad-thu-tien-tan-noi" class="vp">
                     <span>Thu tiền tận nơi</span>
                    <input data-role="none" id="rad-thu-tien-tan-noi" type="radio" name="pay" value="2"> 
                   </label>
                <label for="rad-chuyen-khoan" class="vp">
                    <span>Chuyển khoản ngân hàng</span> 
                    <input data-role="none" id="rad-chuyen-khoan" type="radio" name="pay" value="3"> 
                </label>
            </div>
            <!-- Coupon --> 
            <h3>Mã Giảm Giá</h3>
            <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label> 
            <div class="apply-coupon"></div>

            <div class="btn-submit-tour">
              <button type="submit" id="submit" name="submit">Hoàn tất đặt Tour</button>
            </div>
        </form>
  
        <!-- <div id="error"></div> -->
        <!-- <div id="success-msg"></div> -->
    </div>
</div>
  
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var checkbox = document.querySelector('input[type="checkbox"]');
    var applyCoupon = document.querySelector('.apply-coupon');
    checkbox.addEventListener('change', function () {
      if (checkbox.checked) {
        applyCoupon.innerHTML = `<input name="txt_voucher_tour" value="" id="txt_voucher_tour" type="text" class="form-control row-coupon" autocomplete="off" required placeholder="Vui lòng nhập mã giảm giá...">
                                <span class="btn-submit-voucher voucher-tour ">Áp dụng mã</span>`;
        
      } else {
        applyCoupon.innerHTML = '';
        
      }
    });
  });</script>
</body>
</html>