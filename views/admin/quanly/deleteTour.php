<?php 
    // $queryBuilder = new QueryBuilder();
    // $idTour = $queryBuilder->query($queryBuilder->table("tour_detail")->select("tour_id")
    // ->where("Id","=",$_GET["Id"])->get())[0];
    // $queryBuilder->excute($queryBuilder->delete("schedule","schedule.tour_detail_id = ".$_GET['Id']));
    // $queryBuilder->excute($queryBuilder->delete("service","service.tour_detail_id = ".$_GET['Id']));
    // $queryBuilder->excute($queryBuilder->delete("transport","transport.tour_detail_id = ".$_GET['Id']));
    // $queryBuilder->excute($queryBuilder->delete("tour_detail","tour_detail.Id = ".$_GET['Id']));
    // $queryBuilder->excute($queryBuilder->delete("tour","tour.Id = ".$idTour["tour_id"]));
    // echo "<script>alert('Thêm mới loại hàng thành công!')</script>";
    header("Location: ?act=listProduct");
?>

