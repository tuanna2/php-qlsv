<?php
	if(isset($_POST['submit'])){

echo $_POST["hoTen"];
 echo $_POST["ngaySinh"];
 echo $_POST["diaChi"]; 

if (isset($_FILES['anh']))
{
    if ($_FILES['anh']['error'] > 0)
    {
        echo 'File Upload Bị Lỗi';
    }
    else{
        move_uploaded_file($_FILES['anh']['tmp_name'], './public/upload/'.$_FILES['anh']['name']);
        $anhSV = "./public/upload/".$_FILES['anh']['name'];
        echo $anhSV;
    }}
}

?>