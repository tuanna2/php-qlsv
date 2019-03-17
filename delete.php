<?php 
    $id = $_GET["id"];
    include_once("./db/connect.php");
    $sql->query("delete from students where MaSV=".$id);

?>
<script>
    window.location.href = "./"
</script>