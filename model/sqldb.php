<?php 
    include_once "./database/connection.php";

    function getAllData($field,$tableName){
        global $conn;
        $sql = "SELECT $field FROM $tableName";
        $data = $conn->query($sql);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    // function insertData(){

    // }
?>