<?php 
     $queryBuilder = new QueryBuilder();
    function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }

    function isPost(){
        if(getMethod() == "POST"){
            return true;
        }
        return false;
    }

    function getFields(){
        $dataFields = [];
        if(isPost()){
            if(!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if(is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                    }else{
                        $dataFields[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }

    function validate($rule,$message,&$error){
        global $queryBuilder;
        $rules = $rule;
        $checkValidate = true;
        if(!empty($rules)){
            $dataFields = getFields();
            foreach($rules as $fieldName => $ruleItem){
                if(!isset($dataFields[$fieldName]) && $fieldName != "img"){
                    setErrors($error,$message,$fieldName,"required");
                    $checkValidate = false;
                }
                $ruleItemArr = explode("|",$ruleItem);
                foreach($ruleItemArr as $rule){
                    $ruleName = null;
                    $ruleValue = null;
                    $rulesArr = explode(":",$rule);
                    $ruleName = reset($rulesArr);
                    if(count($rulesArr) > 1){
                        $ruleValue = end($rulesArr);
                    }
                    if(isset($dataFields[$fieldName])){
                        if($ruleName == "required"){
                            if(empty($dataFields[$fieldName])){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "min"){
                            if(strlen(trim($dataFields[$fieldName])) < $ruleValue){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "max"){
                            if(strlen(trim($dataFields[$fieldName])) > $ruleValue){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "email"){
                            if(!filter_var($dataFields[$fieldName],FILTER_VALIDATE_EMAIL)){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "match"){
                            if(trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "phone" || $ruleName == "discount" || $ruleName == "number"){
                            if((int) $dataFields[$fieldName] == 0){
                                setErrors($error,$message,$fieldName,$ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == "unique"){
                            $tableName = null;
                            $fieldCheck = null;
                            if(!empty($rulesArr[1])){
                                $tableName = $rulesArr[1];
                            }

                            if(!empty($rulesArr[2])){
                                $fieldCheck = $rulesArr[2];
                            }
                            
                            if(!empty($tableName) && !empty($fieldCheck)){
                                $check = $queryBuilder->query("SELECT count(*) FROM `$tableName` WHERE `$fieldCheck` = '$dataFields[$fieldCheck]'");
                                if($check[0]["count(*)"] >= 1){
                                    setErrors($error,$message,$fieldName,$ruleName);
                                    $checkValidate = false;
                                }
                            }
                        }
                    }else{
                        if($ruleName == "img"){
                            if(!empty($_FILES[$fieldName])){
                                $checkfile = ["png","jpg","jpeg"];
                                if(!in_array(pathinfo($_FILES[$fieldName]["name"],PATHINFO_EXTENSION),$checkfile)){
                                    setErrors($error,$message,"img",$ruleName);
                                    $checkValidate = false;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $checkValidate;
    }

    function errors($fieldName = "",&$errors){
        if(!empty($errors)){
            if(empty($fieldName)){
                $errorsArr = [];
                foreach($errors as $key=>$error){
                    $errorsArr[$key] = reset($error);
                }

                return $errorsArr;
            }
            return reset($errors[$fieldName]);
        }
        return false;
    }

    function setErrors(&$error = [],$message = [],$fieldName,$ruleName){
        $error[$fieldName][$ruleName] = $message[$fieldName.".".$ruleName];
    }
?>