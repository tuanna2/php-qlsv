<?php
    header("Content-Type: application/json");
    include_once("./db/dbconnect.php");
    $method = $_SERVER['REQUEST_METHOD'];
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $res = new stdClass();
    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        if(! is_array($decoded)) {
            $res->status = 0;
            $res ->message = "Failed";
        } 
        else {
            switch($method){
                case "POST": 
                    $rs = $conn->query("INSERT INTO `students` (`fullname`,`sex`,`birthday`,`address`,`class`,`photo`) VALUES ('".$decoded['name']."','". $decoded['sex']."','".$decoded['birthday']."','".$decoded['address']."','".$decoded['class']."','".$decoded['photo']."')");
                    break;
                case "PUT":
                    $rs = $conn->query("UPDATE `students` SET `fullname` ='".$decoded['name']."',`sex`= '". $decoded['sex']."',`birthday`='".$decoded['birthday']."',`address`='".$decoded['address']."',`class`='".$decoded['class']."',`photo`='".$decoded['photo']."' WHERE id='".$decoded['id']."'");
                    break;
                case "DELETE": 
                    $rs = $conn->query("DELETE FROM `students` where id = '".$decoded['id']."'");
                    break;
            }
            if($rs){
                $res->status = 1;
                $res ->message = "Success";
            }
            else {
                $res->status = 0;
                $res ->message = "Failed data";
            }
        }
    }
    else if($method == "GET"){
        if(isset($_GET["search"])){
            $rs = $conn->query("SELECT * FROM students where `fullname` LIKE '%".$_GET["search"]."%' OR `class` LIKE '%".$_GET["search"]."%'");
        }
        else if(isset($_GET["id"])){
            $rs = $conn->query("SELECT * FROM students where `id` = '".$_GET["id"]."'");
        }
        else{
            $rs = $conn->query("SELECT * FROM students");
        }
        $data = array();
        if($rs){
            $res ->status =1;
            while($row = $rs->fetch_assoc()) {
                $data[] = $row;
            }
            $res ->data= $data;
        }
        else $res ->status=0;
    }
    else{
        $res->status = 0;
        $res->message = "Not accepted content type";
    }
    echo json_encode($res);
    $conn->close();
?>