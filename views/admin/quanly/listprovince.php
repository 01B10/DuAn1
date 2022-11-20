<?php 
    $queryBuilder = new QueryBuilder();
    $listProvince = $queryBuilder->query($queryBuilder->table("province")->select("*")->get());
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tỉnh/Thành</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listProvince)){
                        $i = 0;
                        foreach($listProvince as $item){
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["name"]?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="">Delete</a>
                                        <a href="">Update</a>
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