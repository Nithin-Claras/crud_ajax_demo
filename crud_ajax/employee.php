<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <style type="text/css">
        .loader-div {
            display: none;
            position: fixed;
            margin: 0px;
            padding: 0px;
            right: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 30001;
            opacity: 0.8;
        }

        .loader-img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .loading {
            position: absolute;
            top: 40%;
            left: 47%;
            margin: auto;
            transform: translateY(-50%);
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">PHP Ajax CRUD operation</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>
                <div class="loader-div">
                    <p class="loading">Loading Data</p>
                    <img class="loader-img" src="assets/image/e26300c0c746d3163a0f48223c897cee.gif" id="loading" style="height: 120px;width: auto;" />
                </div>
            </div>
        </div>
    </div>

    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="field2" id="name_input" class="form-control" required>
                        <span class="text-danger" id="nameError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="field1" id="email_input" class="form-control" required>
                        <span class="text-danger" id="emailError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                        <span class="text-danger" id="addressError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" required>
                        <span class="text-danger" id="phoneError"></span><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn_add btn-success" value="Add">
                </div>
            </div>
        </div>
    </div>

    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="nam_input" class="form-control" required>
                        <span class="text-danger" id="namError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                        <span class="text-danger" id="emailError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="addres_input" required></textarea>
                        <span class="text-danger" id="addresError"></span><br>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phon_input" class="form-control" required>
                        <input type="hidden" id="employee_id" class="form-control" required>
                        <span class="text-danger" id="phonError"></span><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn_edit btn-info" value="Save">
                </div>
            </div>
        </div>
    </div>


    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>


    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div>

    <div id="retrieveEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Retrieve Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to retrieve these Records?</p>
                </div>
                <input type="hidden" id="retrieve_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" onclick="  retrieveEmployee()" value="Retrieve">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            employeeList();
        });

        $('body').on('click', '.btn_add', function(e) {
            addEmployee();
        });

        $('body').on('click', '.btn_edit', function(e) {
            editEmployee();
        });

        function employeeList() {


            $.ajax({
                type: 'get',
                url: "employee-list.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var id = response[i].id;
                        var name = response[i].name;
                        var email = response[i].email;
                        var phone = response[i].phone;
                        var address = response[i].address;
                        var is_deleted = response[i].is_deleted;
                        if (is_deleted == "0") {
                            var check = "green";
                        } else {
                            var check = "red";
                        }
                        tr += '<tr class=' + check + '>';
                        tr += '<td>' + id + '</td>';
                        tr += '<td>' + name + '</td>';
                        tr += '<td>' + email + '</td>';
                        tr += '<td>' + address + '</td>';
                        tr += '<td>' + phone + '</td>';
                        tr += '<td>' + (is_deleted == '0' ? 'Active' : 'Inactive') + '</td>';
                        tr += '<td><div class="d-flex">';
                        if (is_deleted == "0") {
                            tr +=
                                '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                                id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                            tr +=
                                '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                                id +
                                '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                            tr +=
                                '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                                id +
                                '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                        } else {
                            tr += '<a href="#retrieveEmployeeModal" class="m-1 retrieve" data-toggle="modal" onclick=$("#retrieve_id").val("' +
                                id +
                                '")><div style="font-size:14px;" class="" data-toggle="tooltip" title="Retrieve">Retrieve</div></a>';
                        }
                        tr += '</div></td>';
                        tr += '</tr>';
                    }
                    $('#employee_data').html(tr);
                    $("#employee_data").DataTable().ajax.reload();
                }
            });


        }

        function addEmployee() {

            $(".text-danger").html("");

            var name = $(".add_epmployee #name_input").val();
            if (name === "") {
                $(".add_epmployee #nameError").html("Name is required");
                return false;
            } else {
                name = $('.add_epmployee #name_input').val();
            }

            var email = $(".add_epmployee #email_input").val();
            emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "") {
                $(".add_epmployee #emailError").html("Email is required");
                return false;

            } else if (!emailReg.test(email)) {
                $(".add_epmployee #emailError").html("Enter a valid email address");
                return false;
            } else {
                email = $('.add_epmployee #email_input').val();
            }

            var address = $(".add_epmployee #address_input").val();
            if (address === "") {
                $(".add_epmployee #addressError").html("Address is required");
                return false;
            } else {
                address = $('.add_epmployee .add_epmployee #address_input').val();
            }

            var phone = $(".add_epmployee #phone_input").val();
            phoneReg = /^[0-9]{10}$/;
            if (phone === "") {
                $(".add_epmployee #phoneError").html("Phone Number is required");
                return false;
            } else if (!phoneReg.test(phone)) {
                $(".add_epmployee #phoneError").html("Enter 10 digit number");
                return false;
            } else {
                phone = $('.add_epmployee #phone_input').val();
            }

            $.ajax({
                type: 'post',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                },
                url: "employee-add.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    $('#addEmployeeModal').modal('hide');
                    employeeList();
                    alert(response.message);
                    location.reload();
                }
            })
        }

        function editEmployee() {

            $(".text-danger").html("");


            var name = $(".edit_employee #nam_input").val();
            if (name === "") {
                $(".edit_employee #namError").html("Name is required");
                return false;
            } else {
                name = $('.edit_employee #nam_input').val();
            }

            var email = $(".edit_employee #email_input").val();
            emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "") {
                $(".edit_employee #emailError").html("Email is required");
                return false;
            } else if (!emailReg.test(email)) {
                $(".edit_employee #emailError").html("Enter a valid email address");
                return false;
            } else {
                email = $('.edit_employee #email_input').val();
            }

            var addres = $(".edit_employee #addres_input").val();
            if (addres === "") {
                $(".edit_employee #addresError").html("Address is required");
                return false;
            } else {
                addres = $('.edit_employee #addres_input').val();
            }

            var phone = $(".edit_employee #phon_input").val();
            phoneReg = /^[0-9]{10}$/;
            if (phone === "") {
                $(".edit_employee #phonError").html("Phone Number is required");
                return false;
            } else if (!phoneReg.test(phone)) {
                $(".edit_employee #phonError").html("Enter 10 digit number");
                return false;
            } else {
                phone = $('.edit_employee #phon_input').val();
            }

            var employee_id = $('.edit_employee #employee_id').val();

            $.ajax({
                type: 'post',
                data: {
                    name: name,
                    email: email,
                    address: addres,
                    phone: phone,
                    employee_id: employee_id,
                },
                url: "employee-edit.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    $('#editEmployeeModal').modal('hide');
                    alert(response.message);
                    $('.loader-div').fadeIn(500);
                    $('.loader-div').fadeOut(500);
                    // location.reload();
                    employeeList();
                }

            })
        }

        function viewEmployee(id) {
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "employee-view.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    $('.edit_employee #nam_input').val(response.name);
                    $('.edit_employee #email_input').val(response.email);
                    $('.edit_employee #phon_input').val(response.phone);
                    $('.edit_employee #addres_input').val(response.address);
                    $('.edit_employee #employee_id').val(response.id);
                    $('.view_employee #name_input').val(response.name);
                    $('.view_employee #email_input').val(response.email);
                    $('.view_employee #phone_input').val(response.phone);
                    $('.view_employee #address_input').val(response.address);
                }
            })
            $(".table #employee_data").ajax.reload();
        }

        function deleteEmployee() {
            var id = $('#delete_id').val();
            $('#deleteEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "employee-delete.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    employeeList();
                    alert(response.message);
                }
            })
        }

        function retrieveEmployee() {
            var id = $('#retrieve_id').val();
            $('#retrieveEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "employee-retrieve.php",
                success: function(data) {
                    var response = JSON.parse(data);
                    employeeList();
                    alert(response.message);
                }
            })
        }
    </script>

</body>

</html>