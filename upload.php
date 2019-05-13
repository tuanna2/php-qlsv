<?php
    header('Content-Type: application/json');
    $res = new stdClass();
    if (isset($_FILES['photo'])){
        if ($_FILES['photo']['error'] > 0){
            $res->status = 0;
            $res->message = "File upload error";
        }
        else{
            move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/'.$_FILES['photo']['name']);
            $anhSV = "/uploads/".$_FILES['photo']['name'];
            $res->status = 1;
            $res->url = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . $anhSV;
        }
    }
    else{
        $res->status = 0;
        $res ->message = "Not file upload";
    }
    echo json_encode($res);
?>