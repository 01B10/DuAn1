<?php 
    $queryBuilder = new QueryBuilder();
    $blog = $queryBuilder->query($queryBuilder->table("blog")->select("*")
    ->where("blog.Id","=",$_GET["Id"])->get())[0];
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
</div>