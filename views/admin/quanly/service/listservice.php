<?php 
    $queryBuilder = new QueryBuilder();
    $listService = $queryBuilder->query($queryBuilder->table("list_service")->select("*")->get());

    if(isset($_GET["act"]) && $_GET["act"] == "deleteService"){
        $queryBuilder->excute($queryBuilder->delete("service","service.listservice_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("list_service","list_service.Id = ".$_GET['Id']));
    }
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
                                <td>
                                    <div class="avatar">
                                        <img src="<?php echo _WEB_ROOT_."/views/admin/icon/".$item["img"]?>" alt="">
                                    </div>
                                </td>
                                <td><?php echo $item["name"]?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="<?php echo "?act=deleteService&Id=".$item["Id"]?>">Delete</a>
                                        <a href="updateService?Id=<?php echo $item["Id"]?>">Update</a>
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