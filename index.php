<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QLSV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        th,td,h1{
            text-align:center;
        }
        body{
            margin-bottom:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quản lý sinh viên</h1>
        <br/>
        <form name="formSearch" onsubmit="return search()">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <input type="text" name="valueSearch" maxlength = "20" class="form-control" placeholder="Tìm kiếm">
                    </div>
                    <button type="submit" class ="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <table id ="students" class="table table-bordered table-hover">
            <tr style="background-color: #999;">
                <th>ID</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Quê</th>
                <th>Lớp</th>
                <th>Ảnh</th>
                <th>Actions</th>
            </tr>
        </table>
        <form class="modal fade" id="formEdit" name="formEdit" role="dialog" onsubmit="return editStudent()">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sửa sinh viên</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên">
                    </div>
                   
                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline"><input type="radio" value="Nam" name="sex" checked>Nam</label>
                        <label class="radio-inline"><input type="radio" value="Nữ" name="sex">Nữ</label>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div>
                            <input type="date" data-date-format="DD MMMM YYYY" name="birthday" class="form-control pull-right">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Quê</label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập quê quán">
                    </div>
                    <div class="form-group">
                        <label>Lớp</label>
                        <input type="text" name="class" class="form-control" placeholder="Nhập tên lớp">
                    </div>
                    <div class="form-group">
                        <label >Ảnh</label>
                        <input onchange="upload(this.files,formEdit)" type="file" accept="image/*">
                        <p class="help-block">Upload ảnh</p>
                        <img name ="photo" width="70" height="70">

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-primary pull-right">Lưu lại</button>
                </div>
            </div>
            
            </div>
        </form>
    </div>
    <div class="container">
        <button class ="btn btn-primary" data-toggle="modal" data-target="#formAdd">Thêm sinh viên</button>
        <form class="modal fade" id="formAdd" name="formAdd" role="dialog" onsubmit="return addStudent()">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm sinh viên</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên">
                    </div>
                   
                    <div class="form-group">
                        <label>Giới tính</label>
                        <label class="radio-inline"><input type="radio" value="Nam" name="sex" checked>Nam</label>
                        <label class="radio-inline"><input type="radio" value="Nữ" name="sex">Nữ</label>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div>
                            <input type="date" data-date-format="DD MMMM YYYY" name="birthday" class="form-control pull-right">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Quê</label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập quê quán">
                    </div>
                    <div class="form-group">
                        <label>Lớp</label>
                        <input type="text" name="class" class="form-control" placeholder="Nhập tên lớp">
                    </div>
                    <div class="form-group">
                        <label >Ảnh</label>
                        <input onchange="upload(this.files,formAdd)" type="file" accept="image/*">
                        <p class="help-block">Upload ảnh</p>
                        <img style="display:none" name ="photo" width="70" height="70">

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-primary pull-right">Thêm</button>
                </div>
            </div>
            
            </div>
        </form>
  
    </div>
</body>
    <script src="./public/jquery.min.js"></script>
    <script src="./public/bootstrap.min.js"></script>
    <script src="./public/root.js"></script>
</html>