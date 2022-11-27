<?php 
    include "connection.php";
    class QueryBuilder{
        public $tableName = "", $field="",$where="",$operator="",$join="",
        $orderBy="",$groupBy="";

        function query($sql){
           try {
                global $conn;
                $data = $conn->query($sql);
                // echo $sql."<br>";
                return $data->fetchAll(PDO::FETCH_ASSOC);
           } catch (Exception $th) {
                echo $th->getMessage();
           }
        }

        function first($sql){
           try {
                global $conn;
                $data = $conn->query($sql);
                return $data->fetch(PDO::FETCH_ASSOC);
           } catch (Exception $th) {
                echo $th->getMessage();
           }
        }

        function excute($sql){
            try {
                global $conn;
                $conn->exec($sql);
                // echo $sql."<br>";
           } catch (Exception $th) {
                echo $th->getMessage();
           }
        }

        function table($tableName){
            $this->tableName = $tableName;
            return $this;
        }

        function select($field = "*"){
            $this->field = $field;
            return $this;
        }

        public function orWhere($field,$compare,$value){
            if(empty($this->where)){
                $this->operator = ' WHERE';
            }else{
                $this->operator = ' OR';
            }
            $this->where .= "$this->operator $field $compare '$value'";
            return $this;
        }

        function where($field,$compare,$value){
            if(empty($this->where)){
                $this->operator = " WHERE";
            }else{
                $this->operator = " AND";
            }
            $this->where .= "$this->operator $field $compare '$value'";
            return $this;
        }

        function delete($tableName,$condition){
            return "DELETE FROM $tableName WHERE $condition";
        }

        function inserData($tableName,$data){
            if(!empty($data)){
                $field = "";
                $valueField = "";
                foreach($data as $key => $value){
                    $field .= $key.",";
                    // $valueField .= "'".$value."',";
                    if($key != "content_schedule" && 
                    $key != "content_service" && $key != "content_blog"){
                        $valueField .= "'".$value."',";
                    }else{
                        $valueField .= $value.",";
                    }
                }
                $field = rtrim($field,",");
                $valueField = rtrim($valueField,",");
                return "INSERT INTO $tableName($field) VALUES ($valueField)";
            };
        }

        function updateData($table,$data,$condition=''){
            if(!empty($data)){
                $updateStr = "";
                foreach($data as $key=>$value){
                    if($key != "content_schedule" && 
                    $key != "content_service" && $key != "content_blog"){
                        $updateStr .= "$key='$value',";
                    }else{
                        $updateStr .= "$key=$value,";
                    }
                }
                $updateStr = rtrim($updateStr,',');
                if(!empty($condition)){
                    $sql = "UPDATE $table SET $updateStr WHERE $condition";
                }else{
                    $sql = "UPDATE $table SET $updateStr";
                }
               
                return $sql;
            }
        }

        function orderBy($field,$type="ASC"){
            $this->orderBy = "ORDER BY $field $type";
            return $this;
        }

        function groupBy($groupBy){
            $this->groupBy = "GROUP BY $groupBy";
            return $this;
        }

        function join($type,$tableName,$relationship){
            $this->join .= $type.' JOIN '.$tableName.' ON '.$relationship.' ';
            return $this;
        }

        function get(){
            $sql = "SELECT $this->field FROM $this->tableName $this->join $this->where $this->groupBy $this->orderBy";
            $this->resetQuery();
            return $sql;
        }

        function resetQuery(){
            $this->tableName = "";
            $this->where = "";
            $this->operator = ""; 
            $this->orderBy = ""; 
            $this->join = ""; 
            $this->groupBy = "";
            $this->limit = "";
            $this->field = "*";
        }
    }
?>