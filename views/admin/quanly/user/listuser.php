<?php 
    $queryBuilder = new QueryBuilder();
    $listCustomer = $queryBuilder->query($queryBuilder->table("customer")->select("*")->get());

    if(isset($_GET["act"]) && $_GET["act"] == "deleteUser"){
        $idOrder = $queryBuilder->query($queryBuilder->table("orderTour")->select("Id")
        ->where("orderTour.cus_id","=",$_GET["Id"])->get())[0];
        $queryBuilder->excute($queryBuilder->delete("comment","comment.cus_id = ".$_GET['Id']));
        if(!empty($idOrder)){
            $queryBuilder->excute($queryBuilder->delete("order_details","order_details.order_id = ".$idOrder["Id"]));
        }
        $queryBuilder->excute($queryBuilder->delete("orderTour","orderTour.cus_id = ".$_GET['Id']));
        $queryBuilder->excute($queryBuilder->delete("customer","customer.Id = ".$_GET['Id']));
    }
?>
    
    <main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Vai trò</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listCustomer)){
                        $i = 0;
                        foreach($listCustomer as $item){
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td>
                                    <div class="avatar">
                                        <img src="<?php echo _WEB_ROOT_."/views/client/img/customer/".$item["img"]?>" alt="">
                                        <span><?php echo $item["name"]?></span>
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                        if($item["gender"] == 1){
                                            echo "Nam";
                                        }elseif($item["gender"] == 2){
                                            echo "Nữ";
                                        }else{
                                            echo "Khác";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $item["email"]?></td>
                                <td><?php echo $item["phone"]?></td>
                                <td>
                                    <?php 
                                            if($item["role"] == 1){
                                                echo "Nhân viên";
                                            }else{
                                                echo "Khách hàng";
                                            }
                                    ?>
                                </td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="<?php echo "?act=deleteUser&Id=".$item["Id"]?>">Delete</a>
                                        <a href="<?php echo "updateUser?Id=".$item["Id"]?>">Update</a>
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