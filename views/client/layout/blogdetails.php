<?php 
    $queryBuilder = new QueryBuilder();
    $blog = $queryBuilder->query($queryBuilder->table("blog")->select("*")
    ->where("blog.Id","=",$_GET["Id"])->get())[0];
    $randomblog = $queryBuilder->query($queryBuilder->table("blog")->select("*")
    ->where("Id","!=",$_GET["Id"])
    ->orderBy("RAND()")->limit(0,5)->get());
?>

<div class="containerBlog">
    <div class="blogs">
        <?php 
            if(!empty($blog)){
        ?>
            <h1><?php echo $blog["title"]?></h1>
            <div class="contentBlog"><?php echo html_entity_decode($blog["content_blog"])?></div>
        <?php
            }
        ?>
    </div>

    <div class="payBlogs">
        <?php 
            if(!empty($blog) && !empty($randomblog)){
        ?>
            <h3>Blog Bạn có thể quan tâm</h3>
            <div class="full-block pay-block">
            <?php 
                foreach($randomblog as $item){
            ?>
                    <div class="gap">
                        <div class="imgBlog">
                            <a href="blogdetails?Id=<?php echo $item["Id"]?>">
                                <img src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$item["img"]?>" alt="">
                            </a>
                        </div>
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
                ?>
            </div>
        <?php
            }
        ?>
    </div>
</div>
<footer>
    <hr>
    <div class="full-footer">
        <h3>@By Nhóm 12</h3>
    </div>
</footer>