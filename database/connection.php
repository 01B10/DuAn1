<?php 
    include_once "./database/config.php";
    print_r($config);
    try {
        $dsn = "mysql:host=".$config["root"].";dbname=".$config["db"].";charset=utf8";
        $conn = new PDO($dsn,$config["user"],$config["pass"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $th) {
        echo $th->getMessage();
    }
?>