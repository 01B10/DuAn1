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
            <h3>@By Nhóm 12</h3>
        </div>
    </footer>