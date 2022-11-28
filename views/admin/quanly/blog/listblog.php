<?php 
    $queryBuilder = new QueryBuilder();
    $blogs = $queryBuilder->query($queryBuilder->table("blog")->select("*")->get());
    
    if(isset($_GET["act"]) && $_GET["act"] == "deleteBlog"){
        $queryBuilder->excute($queryBuilder->delete("blog","blog.Id = ".$_GET['Id']));
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($blogs)){
                        $i = 0;
                        foreach($blogs as $item){
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td><?php echo $item["title"]?></td>
                                <td>
                                    <img class="imgTour" src="<?php echo _WEB_ROOT_."/views/client/img/blogs/".$item["img"]?>" alt="">
                                </td>
                                <td>
                                    <p class="content"><?php echo $item["content_blog"]?></p>
                                </td>
                                <td><?php echo $item["creat_time"]?></td>
                                <td>
                                    <?php
                                        if($item["status"] == 1){
                                            echo "<button type='button' class='statusOrder'>"."Nổi bật"."</button>";
                                        }else{
                                            echo "<button type='button' class='statusOrder'>"."Bình thường"."</button>";
                                        }
                                    ?>
                                </td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="?act=deleteBlog&Id=<?php echo $item["Id"]?>">Delete</a>
                                        <a href="updateBlog?Id=<?php echo $item["Id"]?>">Update</a>
                                    </div>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
</div>