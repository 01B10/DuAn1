<?php 
    $queryBuilder = new QueryBuilder();
    $list = $queryBuilder->query($queryBuilder->table("comment")->select("count(tour.Id) as SL,tour.Id,tour.name")
    ->join("inner","tour","comment.tour_id = tour.Id")
    ->groupBy("tour.Id")
    ->get());
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên tour</th>
                    <th>Số bình luận</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($list)){
                        $i = 0;
                        foreach($list as $item){
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td><?php echo $item["name"]?></td>
                                <td><?php echo $item["SL"]?></td>
                                <td class="action">
                                    <a href="commentDetail?Id=<?php echo $item["Id"]?>" class="dif">Detail</a>
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