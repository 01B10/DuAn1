<?php
    $query = new QueryBuilder();
    $query->table("Test")->select()->where("id","=",10);
    echo $query->get()."<br>";
    $query->table("hello")->select()->where("id","=",10)->groupBy("hello")->orderBy("kaka,huhu");
    echo $query->get()."<br>";
    echo $query->delete("kaka","id = 10")."<br>";
    echo $query->inserData("test",["id"=>10,"name"=>"kaa"]);
    // $data = getAllData("*","service");
    // foreach($data as $item){
    //     $test = html_entity_decode($item["content"]);
    //     echo $test."<br>";
    // }
?>