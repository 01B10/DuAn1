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

    $charTour = $queryBuilder->query($queryBuilder->table("order_details")->select("order_details.tour_id,
    count(order_details.order_id) as SLan,tour.province,province.name")
    ->join("inner","tour","order_details.tour_id = tour.Id")
    ->join("inner","province","tour.province = province.Id")
    ->groupBy("tour.province")
    ->get()
    );

    $province = $queryBuilder->query($queryBuilder->table("province")->select("name")
    ->get());

    $arrProvince = "";
    $arrBook = "";
    foreach($charTour as $item){
        $arrProvince .= "'{$item["name"]}',";
        $arrBook .= "'{$item["SLan"]}',";
    }
    $arrProvince = "[".rtrim($arrProvince,",")."]";
    $arrBook = "[".rtrim($arrBook,",")."]";


    $total = 0;

    foreach($income as $item){
        if($item["status_id"] == 3 || $item["status_id"] == 4){
            $discountTour = ($item["type"] == 2)?($item["total"] - $item["total"] * $item["coupon_value"]/100)
            :$item["total"] - $item["coupon_value"];
            $total += $discountTour;
        }
    }

?>
        <main class="inforCom">
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
        <div class="chart">
            <div class="chartBlock">
                <canvas id="myChart"></canvas>
            </div>
            <div class="chartBlock">
            </div>
        </div>
        <!-- <div>
            <canvas id="myChart"></canvas>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
          type: 'polarArea',
          data: {
            labels: <?php echo $arrProvince?>,
            datasets: [{
              label: 'Số lần đặt',
              data: <?php echo $arrBook?>,
              backgroundColor: [
                'rgba(255,99,132,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(255,140,54,1)',
                'rgba(113,0,185,1)',
                'rgba(41,99,54,1)',
              ],
              borderWidth: 1,
              borderJoinStyle: 'round'
            }]
          },
          options: {
            responsive: true,
          }
        });
    </script>
</body>