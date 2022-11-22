<?php 
    $queryBuilder = new QueryBuilder();
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
?>
<!-- <iframe width="100%" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=vùng đất cố đô&amp;hl=es;z=14&amp;output=embed" allowfullscreen=""></iframe> -->
    <article>
        <form class="search">
            <div class="full-search">
                <h3>Search destination*</h3>
                <input type="text" placeholder="Enter destination">
            </div>
            <div class="full-search">
                <h3>Checkin date**</h3>
                <div class="search-item">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input id="myID" placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="full-search">
                <h3>Checkout date*</h3>
                <div class="search-item">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input id="myID" placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="full-search">
                <button>Inquire now</button>
            </div>
        </form>
        <section class="nice-place">
            <div class="container">
                <h1 class="h1-style">Địa Điểm Nổi Bật</h1>
                <div class="nice-place-content row">
                    <?php 
                            if(!empty($listProvince)){
                                foreach($listProvince as $item){
                    ?>
                                    <div class="nice-place-item">
                                        <div class="nice-place-img">
                                            <a href="tour?Province=<?php echo $item["Id"]?>"><img src="<?php echo _WEB_ROOT_."/views/client/img/province/".$item["img"]?>" alt=""></a>
                                        </div>
                                        <div class="nice-place-text">
                                            <h2><a href="tour?Province=<?php echo $item["Id"]?>"><?php echo $item["name"]?></h2>
                                        </div>
                                    </div>
                    <?php
                            }
                        }
                    ?>
            </div>
        </section>
        <section class="tour">
            <div class="container">
                <h1 class="h1-style">Blog nổi bật</h1>
                <div class="tour-content row">
                    <div class="tour-content-item row">
                        <div class="tour-content-item-img">
                            <img src="<?php echo _WEB_ROOT_."/views/client/img/NT1.jpg"?>" alt="">
                        </div>
                        <div class="tour-content-item-text">
                            <h2>Hà Nội</h2>
                            <p>Lăng Chủ tịch Hồ Chí Minh, còn gọi là Lăng Hồ Chủ tịch, Lăng Bác, là nơi gìn giữ di hài Chủ
                                tịch Hồ Chí Minh, Việt Nam.</p>
                            <button class="btn">Khám phá</button>
                        </div>
                    </div>

                    <div class="tour-content-item row">
                        <div class="tour-content-item-img">
                            <img src="<?php echo _WEB_ROOT_."/views/client/img/HU1.jpg"?>" alt="">
                        </div>
                        <div class="tour-content-item-text">
                            <h2>Hội An</h2>
                            <p>Hội An – đô thị cổ hội tụ tinh hoa vẻ đẹp, văn hóa và lịch sử Việt Nam, luôn nằm trong danh
                                sách top những điểm đến hấp dẫn trên bản đồ du lịch, Việt Nam.</p>
                            <button class="btn">Khám phá</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </article>
    <footer>
        <hr>
        <div class="full-footer">
            <div class="footer1">
                <h4>CÔNG TY CỔ PHẦN TRUYỀN THÔNG DU LỊCH VIỆT</h4>
                <!-- <p>Trụ sở chính: 239A Hoàng Văn Thụ, Phường 8, Quận Phú Nhuận, TP. Hồ Chí Minh.</p>
                <p>Chi nhánh Hà Nội: 44 Tràng Tiền, Quận Hoàn Kiếm, Hà Nội</p>
                <p>Điện thoại: 028 73056789 | Hotline: 1900 1177</p>
                <p>Website: dulichviet.com.vn</p>
                <p>Email: info@dulichviet.com.vn</p> -->
            </div>
            <div class="footer1">
                <h4>Góc khách hàng</h4>
                    <p> Chính sách đặt tour</p>
                    <p> Chính sách bảo mật</p>
                    <p>Ý kiến khách hàng</p>
                    <p>Phiếu góp ý</p>
            </div>
            <div class="footer1">
                <h4>Đăng ký nhận thông tin khuyến mãi</h4>
                    <p>Nhập email để có cơ hội giảm 50% cho <br> chuyến đi tiếp theo của Quý khách</p>
                    <input type="text" placeholder="Email của bạn">
                    <button>Gửi</button>
            </div>
        </div>
    </footer>