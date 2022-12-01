<?php 
    $queryBuilder = new QueryBuilder();
    $customers = $queryBuilder->query($queryBuilder->table("customer")->select("count(*) as customer")
    ->get())[0];

    $tours = $queryBuilder->query($queryBuilder->table("tour")->select("count(*) as tour")
    ->get())[0];

    $orders = $queryBuilder->query($queryBuilder->table("ordertour")->select("count(*) as amountOrder")
    ->get())[0];

    $income = $queryBuilder->query($queryBuilder->table("ordertour")->select("discount_id,discount_code.type,
    discount_code.coupon_value,status_id,total")
    ->join("left","discount_code","ordertour.discount_id = discount_code.Id")
    ->get());

    $total = 0;

    foreach($income as $item){
        if($item["status_id"] == 3 || $item["status_id"] == 4){
            $discountTour = ($item["type"] == 2)?($item["total"] - $item["total"] * $item["coupon_value"]/100)
            :$item["total"] - $item["coupon_value"];
            $total += $discountTour;
        }
    }
?>
<main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $customers["customer"]?></h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $tours["tour"]?></h1>
                        <span>Tours</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $orders["amountOrder"]?></h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h3><?php echo number_format($total)?>VND</h3>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>