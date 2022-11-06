<?php 
    include_once "./database/connection.php";

    function getAllData($field,$tableName){
        global $conn;
        $sql = "SELECT $field FROM $tableName";
        $data = $conn->query($sql);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    function inserData($tableName,$data){
        global $conn;
        if(!empty($data)){
            $field = "";
            $valueField = "";
            foreach($data as $key => $value){
                $field .= $key.",";
                $valueField .= $value.",";
            }
            $field = rtrim($field,",");
            $valueField = rtrim($valueField,",");
            $sql = "INSERT INTO $tableName($field) VALUES ($valueField)";
            $conn->exec($sql);
        };
    }
?>