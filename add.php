<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Them SV</title>
    <link rel="stylesheet" href="./public/css/index.css">

</head>
<body>
    <h1>Them sinh vien</h1>
    <form action="./addPost.php" method="POST" enctype="multipart/form-data">
        <span>Ho Ten: </span><input type="text" name="hoTen"><br/>
        <span>Ngay Sinh: </span><input type="date" name="ngaySinh"><br/>
        <span>Dia Chi: </span><input type="text" name="diaChi"><br/>
        <span>AnhSV: </span><input type="file" accept ="image/*" name="anh"><br/>
        <button type="submit">Them SV</button>
    </form>
</body>
</html>