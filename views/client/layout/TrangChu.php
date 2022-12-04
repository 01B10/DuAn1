<?php 
    $queryBuilder = new QueryBuilder();
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
    $blogs = $queryBuilder->query($queryBuilder->table("blog")->select("*")->where("blog.status","=",1)->get());
    unset($_SESSION["startTime_search"]);
    $x = 0;
    if(isset($_POST["search"])){
        if(!empty($_POST["start_time"]) && !empty($_POST["end_time"])){
            header("Location: Search?province=".$_POST["province"].
            "&start_time=".$_POST["start_time"]."&end_time=".$_POST["end_time"]);
        }
    }
    
?>
    <article>
        <form action="" class="search" method="POST">
            <div class="full-search">
                <h3>Search destination*</h3>
                <select name="province">
                    <option value="0">Tất cả</option>
                    <?php 
                        foreach($listProvince as $item){
                    ?>
                            <option value="<?php echo $item["Id"]?>"><?php echo $item["name"]?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="full-search">
                <h3>Checkin date**</h3>
                <div class="search-item">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input name="start_time" id="myID" placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="full-search">
                <h3>Checkout date*</h3>
                <div class="search-item">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input name="end_time" id="myID" placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="full-search">
                <button name="search">Inquire now</button>
            </div>
        </form>
        <section class="nice-place">
            <div class="containerPlace">
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
                                            <h2><a href="tour?Province=<?php echo $item["Id"]?>"><?php echo $item["name"]?></a></h2>
                                        </div>
                                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="tourBlog">
            <div class="containerPlace">
                <h1 class="h1-style">Blog nổi bật</h1>
                <div class="tour-content row">
                    <?php 
                        if(!empty($blogs)){
                            foreach($blogs as $item){
                    ?>
                            <div class="tour-content-item row">
                                <div class="tour-content-item-img">
                                    <a href="blogdetails?Id=<?php echo $item["Id"]?>"><img src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$item["img"]?>" alt=""></a>
                                </div>
                                <div class="tour-content-item-text">
                                    <h2><a href="blogdetails?Id=<?php echo $item["Id"]?>"><?php echo $item["title"]?></a></h2>
                                    <div class="content">
                                        <?php echo html_entity_decode($item["content_blog"])?>
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    </article>
    <footer>
        <hr>
        <div class="full-footer">
            <h3>@By Nhóm 12</h3>
        </div>
    </footer>