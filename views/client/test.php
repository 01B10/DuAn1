<?php 
    $data = getAllData("*","service");
    foreach($data as $item){
        // echo html_entity_decode($item["content"])."<br>";
        $test = html_entity_decode($item["content"]);
        // echo html_entity_decode($item["content"])."<br>";
        // echo is_string(2);
        echo $test."<br>";
    }
    echo "";
?>