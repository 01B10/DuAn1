<?php 
    $data = getAllData("*","service");
    foreach($data as $item){
        $test = html_entity_decode($item["content"]);
        echo $test."<br>";
    }
?>