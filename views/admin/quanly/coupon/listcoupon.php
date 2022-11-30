<?php 
    $queryBuilder = new QueryBuilder();
    $coupon = $queryBuilder->query($queryBuilder->table("discount_code")->select("*")
    ->get());
?>

<main>
        <table class="listuser">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Mã giảm giá</th>
                    <th>Giá trị</th>
                    <th>Số lượng</th>
                    <th>Ngày tạo</th>
                    <th>Ngày kết thúc</th>
                    <th>Loại</th>
                    <th>Miêu tả</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($coupon)){
                        $i = 0;
                        foreach($coupon as $item){
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $item["Id"]?></td>
                                <td><?php echo $item["code"]?></td>
                                <td><?php echo ($item["type"] == 1)?number_format($item["coupon_value"])."VND":$item["coupon_value"]."%"?></td>
                                <td><?php echo $item["amount"]?></td>
                                <td><?php echo date_format(date_create($item["creat_time"]),"d-m-Y");?></td>
                                <td><?php echo date_format(date_create($item["end_time"]),"d-m-Y");?></td>
                                <td>
                                    <?php
                                        echo ($item["type"] == 1)?"Theo giá":"Theo phần trăm";
                                    ?>
                                </td>
                                <td><?php echo $item["description"]?></td>
                                <td class="action">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="hidden">
                                        <a href="">Delete</a>
                                        <a href="">Detail</a>
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