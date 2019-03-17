<?php
$sql = new mysqli("localhost", "root", "", "qlsv");

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}
 
?> 