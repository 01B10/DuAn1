<?php 
    $queryBuilder = new QueryBuilder();
    $comment = $queryBuilder->query($queryBuilder->table("comment")->select("comment.Id,customer.name,comment.content,comment.time")
    ->join("inner","customer","comment.cus_id = customer.Id")
    ->where("comment.tour_id","=",$_GET["Id"])
    ->orderBy("comment.Id","DESC")
    ->get());

    if(isset($_GET["act"]) && $_GET["act"] == "deleteComment"){
        $queryBuilder->excute($queryBuilder->delete("comment","comment.Id = ".$_GET['Id']));
    }
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Thời gian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($comment)){
                        $i = 0;
                        foreach($comment as $item){
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td><?php echo $item["name"]?></td>
                                <td><?php echo $item["content"]?></td>
                                <td><?php echo date_format(date_create($item["time"]),"h:i:s d-m-Y")?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="?act=deleteComment&Id=<?php echo $item["Id"]?>">Delete</a>
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