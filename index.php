<?php
    include_once("./db/connect.php");
    $result = $sql->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QLSV</title>
    <link rel="stylesheet" href="./public/css/index.css">
</head>
<body>
    <h1>Quan Ly Sinh Vien</h1>
    <span>Tim theo ten:</span>
    <input type="text" id="valueSearch">
    <button id="search">Tim</button>
    <table>
        <tr>
            <th>Ma SV</th>
            <th>Ho Ten</th>
            <th>Ngay Sinh</th>
            <th>Dia Chi</th>
            <th>Anh SV</th>
            <th>Action</th>
        </tr>
        <?php 
            while($row = $result->fetch_assoc()) {
                echo "<tr class='data-table'><td>" . $row["MaSV"] . "</td><td>" . $row["HoTen"] . "</td><td>" . $row["NgaySinh"] . "</td><td>" . $row["DiaChi"] . "</td><td>" . $row["AnhSV"] . "</td><td>" . "<a class='boxAction' href='./edit?id=" . $row["MaSV"] ."'>Edit </a>" . "<button class='boxAction' onClick='return deleteStudent(" . $row["MaSV"] .")'>Delete</button></td></tr>";
            }
        ?>
    </table>
    <a href="./add.php">Them sinh vien</a>
</body>
    <script>
        function deleteStudent(id){
            let r = confirm("Co chac muon xoa SV nay?");
            if(r)
                window.location.href="./delete.php?id=" +id;
        }
    </script>
</html>

<?php
    $sql->close();
?>