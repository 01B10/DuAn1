<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT_."/views/client/assets/css/bookTour.css"?>">
    <script src="https://kit.fontawesome.com/5dd6f63e97.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .binhluan {
    background: white;
	border-radius: 10px;
	width: 100%;
	height: 300px;
	justify-content: center;
	align-items: center;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}
.binhluan .form textarea {
	background: #222222;
	color: white;
	font-size: 15px;
	width: 100%;
	border-radius: 20px;
	padding: 10px;
	border: none;
	outline: none;
	resize: none;
}

.binhluan .form .btn-comment{
	background: #222222;
	color: white;
	font-size: 15px;
	border: none;
	outline: none;
	cursor: pointer;
	padding: 10px;
	width: 200px;
	border-radius: 20px;
	margin: 0 auto;
	display: block;
	margin-top: 5px;
	margin-bottom: 20px;
	opacity: 0.8;
	transition: 0.3s all ease;
}

.binhluan .form .btn-comment:hover {
	opacity: 1;
}

.content {
	text-align: center;
	background: royalblue;
	color: white;
	padding: 10px;
	width: 500px;
	border-radius: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}

.content p {
	margin-bottom: 15px;
	width: 450px;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="gr-1">
            <h1 class="title-tour">Tour du lịch thiên đường Maldives 5 ngày 4 đêm</h1>
            <!-- SlideShow -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                  <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-2.jpg" style="width:100%">
                  
                </div>
              
                <div class="mySlides fade">
                  <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-3.jpg" style="width:100%">
                  
                </div>
              
                <div class="mySlides fade">
                  <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-4.jpg" style="width:100%">
                  
                </div>

                <div class="mySlides fade">
                    <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-6.jpg" style="width:100%">
                    
                  </div>
                
                  <div class="mySlides fade">
                    <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-1.jpg" style="width:100%">
                    
                  </div>

                <!-- <div class="mySlides fade">
                    <img src="https://www.vietnambooking.com/wp-content/uploads/2019/12/tour-ha-noi-ha-giang-3-ngay-2-dem-4.jpg" style="width:100%">
                    <div class="text">Caption Three</div>
                  </div> -->
                
              </div>
              <br>
              
              <!-- The dots/circles -->
              <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
              </div>
           <table class="tlb-info-tour">
            <tbody>
                <tr>
                   <td><i class="fa-solid fa-location-dot"></i>Địa ĐIểm</td>
                   <td><i class="fa-regular fa-clock"></i>Time</td>
                   <td><i class="fa-solid fa-car"></i>Phương Tiện</td>
                   <td class="code-tour">Mã Tour:</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-calendar-days"></i>Khởi Hành:</td>
                </tr>
            </tbody>
        </table>
            <hr>

            <!--  -->
            <div class="box-service-tour">
                <h2>Dịch Vụ Theo Kèm</h2>
                <ul class="list-extra-services">
                    <li><img src="https://www.vietnambooking.com/wp-content/themes/vietnambooking_master/images/index/tour/icon_services/icon_tick.png" alt="bao hiem">&nbsp;&nbsp;Bảo hiểm</li>
                    <li><img src="https://www.vietnambooking.com/wp-content/themes/vietnambooking_master/images/index/tour/icon_services/icon_meal.png" alt="bua an">&nbsp;&nbsp;Bữa ăn</li>
                    <li><img src="https://www.vietnambooking.com/wp-content/themes/vietnambooking_master/images/index/tour/icon_services/icon_guide.png" alt="huong dan vien">&nbsp;&nbsp;Hướng dẫn viên</li>
                    <li><img src="https://www.vietnambooking.com/wp-content/themes/vietnambooking_master/images/index/tour/icon_services/icon_ticket.png" alt="ve tham quan">&nbsp;&nbsp;Vé tham quan</li>
                    <li><img src="https://www.vietnambooking.com/wp-content/themes/vietnambooking_master/images/index/tour/icon_services/icon_bus.png" alt="Xe đưa đón">&nbsp;&nbsp;Xe đưa đón</li>
                </ul>
            </div>

            <div class="single-box-excerpt">
                <p>
                    Đặt mua <strong>Tour Đà Lạt 3 ngày 3 đêm</strong> trọn gói giá rẻ của Vietnam Booking, quý khách sẽ được khám phá Đà Lạt nổi tiếng với những công trình nhân tạo đặc sắc, mang đậm hơi thở của núi rừng. Du khách sẽ được trải nghiệm nhiều hoạt động thú vị và ý nghĩa trong suốt chuyến hành trình tại xứ sở ngàn hoa.
                </p>
                <u><strong>TOUR CÓ GÌ HẤP DẪN?</strong></u>
                <ul>
                    <li style="text-align: justify;">
                        <span style="color:#006400;"><b id="docs-internal-guid-a7c67c98-7fff-a0e4-b0e4-5302539e2b53">Check in tại Thung Lũng Đèn với "nấc thang lên thiên đường".</b></span>
                    </li>
                    <li style="text-align: justify;">
                        <span style="color:#006400;"><b id="docs-internal-guid-a7c67c98-7fff-a0e4-b0e4-5302539e2b53">Khám phá những công trình đặc sắc như Chùa Linh Phước,...</b></span>
                    </li>
                    <li style="text-align: justify;">
                        <span style="color:#006400;"><b id="docs-internal-guid-a7c67c98-7fff-a0e4-b0e4-5302539e2b53">Vui đùa bên những chú cún vô cùng dễ thương tại Puppy Farm.</b></span>
                    </li>
                    <li style="text-align: justify;">
                        <font color="#006400"><b>Hóa thân thú vị với muôn kiểu tạo dáng tại Bảo tàng tranh 3D.</b></font>
                    </li>
                </ul>
                
            </div>
            <div class="panel-group" id="tour-product">
                <div class="panel-tour-product">
                    <div class="panel-tour-product-title">
                        <h4>CHƯƠNG TRÌNH TOUR</h4>
                        <i class="pull-right fa fa-chevron-down"></i>
                    </div>
                    <div class="panel-tour-product-content">
                        <h3 style="text-align: justify;">
                            <span style="color:#B22222; font-size:16px;"><strong><u>NGÀY 0</u></strong><strong><u>1 |</u></strong>&nbsp;<strong><u>HÀ NỘI – QUẢN BẠ - YÊN MINH</u></strong><strong><u>&nbsp;</u></strong><strong><u>(ĂN </u></strong></span><strong><span style="color:#B22222;"><u>TRƯA, TỐI)</u></span></strong>
                        </h3>
                        <p style="text-align: justify;">
                            <u><strong>Sáng:</strong></u>&nbsp;Xe &amp; Hướng Dẫn Viên (HDV)<strong> <a href="https://www.vietnambooking.com" target="_blank">Vietnam Booking</a>&nbsp;</strong>đón Quý khách tại điểm hẹn&nbsp;khởi hành đi Hà Giang. Trên đường Quý khách có thể tranh thủ chiêm ngưỡng cảnh sắc&nbsp;rừng núi vô cùng hùng vĩ và hoang sơ. Và dọc đường đi, xe sẽ dừng nghỉ, Quý khách có thể xuống sẽ thư giãn và chụp hình, sau đó tiếp tục hành trình đi <a href="https://www.vietnambooking.com/du-lich/tour-du-lich-ha-noi-ha-giang-3-ngay-2-dem.html" target="_blank"><strong><em>tour du lịch Hà Nội Hà Giang 3 ngày 2 đêm</em></strong></a>
                        </p>
                        <p style="text-align: justify;">
                            <meta charset="utf-8"><u><strong>Trưa:</strong></u> Quý khách dùng bữa&nbsp;trưa tại nhà hàn. Sau đó tiếp tục hành trình đến với&nbsp;<strong>Cổng Trời Quản Bạ.</strong>
                        </p>
                        <p style="text-align: justify;">
                            <u><strong>Chiều:</strong></u>&nbsp;Xe và HDV đưa quý khách đến&nbsp;<strong>Cổng Trời Quản Bạ</strong> chụp hình <strong>Núi đôi Cô Tiên</strong><b>.&nbsp;</b>Nơi đây, Quý khách sẽ được ngắm nhìn&nbsp;sự kỳ diệu của tạo hóa khi được thiên nhiên ưu ái cho mảnh đất này. Tại đậy, du khách có thể ngắm&nbsp;nhìn toàn cảnh thị trấn Tam Sơn từ trên cao. Từ đây, Quý khách sẽ được tận mắt chiêm ngưỡng rừng thông bạt ngàn đẹp nhất Việt Nam trên đường đến Yên Minh.
                        </p>
                        <p style="text-align: justify;">
                            <strong><u>Tối</u>:</strong>&nbsp;Đoàn đến <strong>Yên Minh</strong>, Quý khách dùng bữa&nbsp;tối. Buổi tối tự do khám phá vùng cực bắc&nbsp;tổ quốc về đêm. Nghỉ đêm tại Hà Giang.
                        </p>
                        <h3 style="text-align: justify;">
                            <span style="color:#B22222; font-size:16px;"><strong><u>NGÀY 0</u></strong><strong><u>2 |</u></strong>&nbsp;</span><strong><span style="color:#B22222;"><u>YÊN MINH – CAO NGUYÊN ĐỒNG VĂN - LŨNG CÚ&nbsp;(ĂN SÁNG, TRƯA, TỐI)</u></span></strong>
                        </h3>
                        <p style="text-align: justify;">
                            <u><strong>Sáng:</strong></u> Quý khách dùng điểm tâm sáng và làm thủ tục trả phòng. Sau đó, xe &amp; HDV đưa đoàn&nbsp;khởi hành đi chiêm ngưỡng những cảnh đẹp hùng vỹ của Công viên địa chất toàn cầu <strong>Cao nguyên đá Đồng Văn</strong>. Dọc đường đi Quý khách&nbsp;ghé thăm các địa danh nổi tiếng của <strong><a href="https://www.vietnambooking.com/du-lich/tour-du-lich/du-lich-ha-giang.html" target="_blank">tour&nbsp;Hà Giang</a></strong>:
                        </p>
                        <ul>
                            <li style="text-align: justify;">
                                <strong>Phố Cáo</strong>: Du khách sẽ được chiêm ngưỡng nét đẹp hoang sơ với bức tranh muôn màu đầy biến hóa của mảnh đất Hà Giang.
                            </li>
                            <li style="text-align: justify;">
                                <strong>Bản</strong> <strong>Sủng Là:</strong> Nơi đây&nbsp;từng được biết đến là&nbsp;bối cảnh để quay bộ phim nhựa "Chuyện của Pao" năm 2006 của đạo diễn Ngô Quang Hải.
                            </li>
                            <li aria-level="1" dir="ltr">
                                <strong>Dinh Thự Họ Vương:</strong>&nbsp;Một điểm đến vô cùng độc đáo không ai có thể bỏ qua khi đặt chân đến mảnh đất nơi địa đầu Tổ Quốc.
                            </li>
                            <li style="text-align: justify;">
                                Check-in với <strong>Cột Cờ Lũng Cú</strong> - nơi địa đầu tổ quốc, điểm có vĩ độ cao nhất trên bản đồ Việt Nam.
                            </li>
                        </ul>
                        <p style="text-align: justify;">
                            ​<u><strong>Trưa:</strong></u>&nbsp;Đoàn ăn trưa tại nhà hàng.
                        </p>
                        <p style="text-align: justify;">
                            <u><strong>Chiều</strong></u><strong>:</strong>&nbsp;Xe và HDV sẽ đưa Quý khách đến phố cổ Đồng Văn nhận phòng. Sau đó, đoàn tiếp tục chuyến hành trình <em>Tour du lịch&nbsp;Hà Nội Hà Giang 3 Ngày 2 Đêm</em>:
                        </p>
                        <ul>
                            <li style="text-align: justify;">
                                Chinh phục <strong>đèo</strong> <strong>Mã Pì Lèng</strong> trên đường đi Mèo Vạc, cũng là đoạn đẹp nhất của&nbsp;con đường mang tên "Đường Hạnh phúc".
                            </li>
                            <li style="text-align: justify;">
                                Chụp hình và chiêm ngưỡng vẻ đẹp hùng vĩ của <strong>hẻm vực Mã Pì Lèng</strong> sâu 800m - nơi địa hình bị chia cắt sâu nhất của Việt Nam.
                            </li>
                        </ul>
                        <p style="text-align: justify;">
                            <u><strong>Tối:</strong></u>&nbsp;Đoàn ăn tối tại nhà hàng. Buổi tối Quý khách tự do khám phá <strong>Phố Cổ Đồng Văn</strong>, địa danh đã tồn tại cùng với thời gian gần một thế kỷ. Nghỉ đêm tại trấn <strong>Đồng Văn</strong>.
                        </p>
                        <h3>
                            <strong><span style="color:#B22222;"><u>NGÀY 03 |&nbsp;ĐỒNG VĂN&nbsp;– HÀ NỘI (ĂN SÁNG, TRƯA)</u></span></strong>
                        </h3>
                        <p style="text-align: justify;">
                            <u><strong>Sáng:</strong></u>&nbsp;Ngày cuối cùng, Quý khách thức dậy dùng điểm tâm sáng. Đoàn có thể&nbsp;chứng kiến cảnh bà con nhiều thành phần dân tộc&nbsp;từ các nẻo đường tập trung về <strong>chợ phiên Đồng Văn</strong> để tham gia phiên họp chợ diễn ra vào sáng chủ nhật hàng tuần.
                        </p>
                        <p style="text-align: justify;">
                            <u><strong>Trưa:</strong></u>&nbsp; Đoàn&nbsp;dùng bữa trưa, nghỉ ngơi&nbsp;tại nhà hàng trên đường đi.
                        </p>
                        <p style="text-align: justify;">
                            <u><strong>Chiều</strong>:</u>&nbsp;Quý khách tiếp tục hành trình về Hà Nội.
                        </p>
                        <p style="text-align: justify;">
                            <u><strong>Tối:</strong></u>&nbsp;&nbsp;Về đến Hà Nội, xe và HDV đưa quý&nbsp;khách về lại&nbsp;điểm đón ban đầu. Kết thúc <strong><em>tour du lịch Hà Nội Hà Giang 3 ngày 2 đêm</em></strong>. Hẹn gặp lại quý khách vào những <a href="https://www.vietnambooking.com/du-lich" target="_blank"><strong>tour&nbsp;du lịch giá rẻ</strong></a>&nbsp;tiếp theo.
                        </p>
                        <p style="text-align: justify;">
                            <em><u><strong>LƯU Ý:</strong></u> Thứ tự và chi tiết trong chương trình có thể thay đổi cho phù hợp với tình hình thực tế, nhưng vẫn đảm bảo đủ điểm đến tham quan !</em>
                        </p>
                    </div>
                </div>
                <div class="panel-tour-product">
                    <div class="panel-tour-product-title">
                        <h4>DỊCH VỤ BAO GỒM</h4>
                        <i class="pull-right fa fa-chevron-down"></i>
                    </div>
                    <div class="panel-tour-product-service">
                        <table cellpadding="1" cellspacing="1" class="banggia">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <strong>KHỞI HÀNH</strong>
                                    </th>
                                    <th colspan="3" rowspan="1" scope="col">
                                        <p>
                                            <strong>GIÁ TOUR*** (VND/ KHÁCH</strong>
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="1">
                                        <p style="text-align: center;">
                                            &nbsp;
                                        </p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;">
                                            NGƯỜI LỚN&nbsp;(từ 11&nbsp;tuổi trở lên)
                                        </p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;">
                                            TRẺ EM**
                                        </p>
                        
                                        <p style="text-align: center;">
                                            (từ 5 - 11&nbsp;tuổi)
                                        </p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;">
                                            EM BÉ
                                        </p>
                        
                                        <p style="text-align: center;">
                                            (từ 1 - 4&nbsp;tuổi)
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="text-align: center;">
                                        <strong>Thứ 6 hàng tuần</strong>
                                    </td>
                                    <td style="text-align: center;">
                                        <span style="color:#FF0000;"><strong><em>2.890.000</em></strong></span>
                                    </td>
                                    <td style="text-align: center;">
                                        <strong><em>2.300.000</em></strong>
                                    </td>
                                    <td style="text-align: center;">
                                        <strong><em>Liên hệ</em></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
            </div>
            <div class="box-form-price-tour horizontal">    
                <form action="" method="get">
                <table class="tlb-box-price-tour">
                    <tbody><tr>
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
                            <input required="required" name="id" value="374368" type="hidden">
                            <input type="date" value="08/11/2022" name="date_start" class="form-control txt-date-start hasDatepicker" required="required" id="dp1667855375350">
                        </td>
                        <td>
                            <label class="slc-tour-people-title" style="margin-left: -20px;">Số khách</label><br>
                            <select data-price="2390000" name="number_people" class="form-control slc-tour-people">
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn-submit-set-tour" type="submit">Đặt Tour</button>
                        </td>
                        
                    </tr>
                    
                </tbody></table>
            </form>
            </div>

            <div class="binhluan">
		<form action="" method="post" class="form">
			
			<textarea name="message" cols="30" rows="10" class="message" placeholder="Viết bình luận..."></textarea>
			<br>
			<button type="submit" class="btn-comment" name="post_comment">Gửi bình luận</button>
		</form>
	</div>
           
           
           
            
        </div>
        <div class="gr-2">
            <div class="grid_4 omega">
                <div class="sidebar-box-tour" style="z-index: auto; position: static; top: auto;">
        <div class="box-form-price-tour-2 vertical" style="margin-top: 50px; display: block;">    
<form action="" method="get" class="form-booking">
<table class="tlb-box-price-tour">
    <tbody><tr>
        <td colspan="2">
            <span class="price-tour">
                <div class="title-price-old-2 horizontal"><del>3,464,000 VND</del></div>
                <div class="title-price-new-2">
                    2,390,000 <span class="title-price-new-slot">VND/người</span> 
                </div>
                                           
            </span>                             </span>
        </td>
    </tr>
    <tr class="row-khoihanh">
        <td><label class="khoihanh">Khởi hành</label></td>
        <td>
            <input required="required" name="id" value="374368" type="hidden">
            <input type="date" data-role="none" value="08/11/2022" name="date_start" class="form-control-2 txt-date-start hasDatepicker" required="required" id="dp1667855375351">
        </td>
    </tr>
    <tr>
        <td><label class="sokhach">Số khách</label></td>
        <td>
            <select data-role="none" data-price="2390000" name="number_people" class="form-control slc-tour-people-2">
                <option value="1">01 Khách</option>
                <option value="2">02 Khách</option>
                <option value="3">03 Khách</option>
                <option value="4">04 Khách</option>
                <option value="5">05 Khách</option>
                <option value="6">06 Khách</option>
                <option value="7">07 Khách</option>
                <option value="8">08 Khách</option>
                <option value="9">09 Khách</option>
                <option value="10">10 Khách</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><button data-role="none" class="btn-submit-set-tour-2" type="submit">Đặt Tour</button></td>
    </tr>
    </tbody>
</table>
</form>
</div>


                </div>
        </div>
    </div>
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
    showSlides();
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>
</body>
</html>