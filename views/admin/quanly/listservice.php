<?php 
    $queryBuilder = new QueryBuilder();
    $listService = $queryBuilder->query($queryBuilder->table("list_service")->select("*")->get());
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Biểu tượng</th>
                    <th>Tên dịch vụ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($listService)){
                        $i = 0;
                        foreach($listService as $item){
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td class="avatar">
                                    <img src="<?php echo _WEB_ROOT_."/views/admin/icon/".$item["img"]?>" alt="">
                                </td>
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