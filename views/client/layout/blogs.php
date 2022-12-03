<?php 
    $queryBuilder = new QueryBuilder();
    $blogs = $queryBuilder->query($queryBuilder->table("blog")->select("*")
    ->where("blog.status","=",2)->get());
?>

    <article class="article">
        <div class="Title">
            <h1>Blogs du lịch</h1>
        </div>
        <div class="blog">
            <?php 
                if(!empty($blogs)){
                    foreach($blogs as $item){
            ?>
                        <div class="full-block">
                            <a href="blogdetails?Id=<?php echo $item["Id"]?>">
                                <img src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$item["img"]?>" alt="">
                            </a>
                            <div class="location">
                                <a href="blogdetails?Id=<?php echo $item["Id"]?>"><h2><?php echo $item["title"]?></h2></a>
                            </div>
                            <div>
                                <i class="fa-solid fa-calendar-plus"></i>
                                <span><?php echo date_format(date_create($item["creat_time"]),"d-m-Y")?></span>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>

    </article>
    <footer>
        <hr>
        <div class="full-footer">
            <div class="footer1">
                <h4>CÔNG TY CỔ PHẦN TRUYỀN THÔNG DU LỊCH VIỆT</h4>
                <p>Trụ sở chính: 239A Hoàng Văn Thụ, Phường 8, Quận Phú Nhuận, TP. Hồ Chí Minh.</p>
                <p>Chi nhánh Hà Nội: 44 Tràng Tiền, Quận Hoàn Kiếm, Hà Nội</p>
                <p>Điện thoại: 028 73056789 | Hotline: 1900 1177</p>
                <p>Website: dulichviet.com.vn</p>
                <p>Email: info@dulichviet.com.vn</p>
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