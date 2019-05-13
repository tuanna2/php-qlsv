const table = document.getElementById('students');
getData('http://localhost/php-qlsv/server.php');

function getData(url) {
    fetch(url)
        .then(response => response.json())
        .then(res => {
            $('.data-table').remove();
            res.data.forEach(e => {
                table.innerHTML += '<tr class="data-table"><td>' + e.id + '</td><td>' + e.fullname + '</td><td>' + e.sex + '</td><td>' + e.birthday + '</td><td>' + e.address + '</td><td>' + e.class + '</td><td><img src="' + e.photo + '" width ="70" height ="70"></td><td><button class="btn btn-info" onclick = "openEditStudent(' + e.id + ')">Edit </button><button class="btn btn-danger" onClick="return deleteStudent(' + e.id + ')">Delete</button></td> </tr>';
            })
        })
        .catch(e => {
            console.log(e);
        });
}
function search() {
    getData('http://localhost/php-qlsv/server.php?search=' + formSearch.valueSearch.value);
    return false;
}
function deleteStudent(id) {
    let r = confirm("Có chắc muốn xoá sinh viên này?");
    if (r) {
        fetch('/php-qlsv/server', {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json'
            },
            mode: "same-origin",
            credentials: "same-origin",
            body: JSON.stringify({ id })
        })
            .then((response) => {
                return response.json();
            })
            .then(res => {
                if (res.status == 1) {
                    getData('http://localhost/php-qlsv/server.php');
                }
                else {
                    alert('Xoá thất bại');
                    console.log(err);
                }
            })
            .catch(err => {
                alert('Xoá thất bại');
                console.log(err);
            });
    }
}
function openEditStudent(id) {
    fetch('http://localhost/php-qlsv/server.php?id=' + id)
        .then(response => response.json())
        .then(res => {
            if (res.status == 1) {
                formEdit.id.value = res.data[0].id;
                formEdit.fullname.value = res.data[0].fullname;
                formEdit.sex.value = res.data[0].sex;
                formEdit.birthday.value = res.data[0].birthday;
                formEdit.address.value = res.data[0].address;
                formEdit.class.value = res.data[0].class;
                formEdit.photo.setAttribute('src', res.data[0].photo);
                $('#formEdit').modal();
            }
            else location.reload();
        })
        .catch(e => console.log(e));
}
function editStudent() {
    if (checkData(formEdit)) {
        fetchData(formEdit, 'PUT')
            .then(res => {
                if (res.status == 1) {
                    $('#formEdit').modal('hide');
                    getData('http://localhost/php-qlsv/server.php');
                }
                else {
                    alert('Sửa thất bại');
                    console.log(res);
                }
            }, err => {
                alert('Sửa thất bại !')
                console.log(err);
            })
    }
    return false;
}
function addStudent() {
    if (checkData(formAdd)) {
        fetchData(formAdd, 'POST')
            .then(res => {
                if (res.status == 1) {
                    $('#formAdd').modal('hide');
                    getData('http://localhost/php-qlsv/server.php');
                }
                else {
                    alert('Thêm thất bại');
                    console.log(res);
                }
            }, err => {
                alert('Thêm thất bại !')
                console.log(err);
            })
    }
    return false;
}
function fetchData(form, method) {
    return new Promise((resolve, reject) => {
        fetch('/php-qlsv/server', {
            method: method,
            headers: {
                'Content-Type': 'application/json'
            },
            mode: "same-origin",
            credentials: "same-origin",
            body: JSON.stringify({
                id: method == 'PUT' ? form.id.value : null,
                name: form.fullname.value,
                sex: form.sex.value,
                birthday: form.birthday.value,
                address: form.address.value,
                class: form.class.value,
                photo: form.photo.getAttribute('src')
            })
        })
            .then((response) => {
                return resolve(response.json());
            })
            .catch(err => {
                return reject(err);
            });
    })
}
function checkData(form) {
    if (form.fullname.value == '' || form.sex.value == '' || form.address.value == '' || form.class.value == '' || form.photo.value == '' || form.photo.getAttribute('src') == '') {
        alert('Vui lòng điền đầy đủ thông tin sinh viên !');
        return false;
    }
    return true;
}

function upload(file, form) {
    let formData = new FormData();
    formData.append('photo', file[0]);
    fetch('/php-qlsv/upload', {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (res) {
            if (res.status == 1) {
                form.photo.style.display = 'block';
                form.photo.setAttribute("src", res.url);
            }
            else {
                alert('Ảnh không hợp lệ');
            }
        })
        .catch(function (err) {
            alert('Ảnh không hợp lệ');
            console.log(err);
        });
}