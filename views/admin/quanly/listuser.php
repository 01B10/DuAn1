    <?php 
        $queryBuilder = new QueryBuilder();
        $listCustomer = $queryBuilder->query($queryBuilder->table("customer")->select("*")->get());
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
                    <th>Mật khẩu</th>
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
                                <td class="avatar">
                                    <img src="<?php echo _WEB_ROOT_."/views/client/img/".$item["img"]?>" alt="">
                                    <span><?php echo $item["name"]?></span>
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
                                            if($item["gender"] == 1){
                                                echo "Nhân viên";
                                            }else{
                                                echo "Khách hàng";
                                            }
                                    ?>
                                </td>
                                <td><?php echo $item["password"]?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="">Delete</a>
                                        <a href="updateUser">Update</a>
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