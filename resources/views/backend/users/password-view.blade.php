@extends('backend.master')
@section('title')
Pos|User
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Manage Password</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <div class="card-header">
                        <h4 class="m-0 text-dark">Edit Password</h4>
                    </div>
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{Route('profiles.password.update')}}" id="myForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="c_password">Current Password</label>
                                        <input type="password" name="c_password" class="form-control" id="c_password">
                                        <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password">New Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password2">Confirm New Password</label>
                                        <input type="password" name="password2" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>

                                </div>


                            </form>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                c_password: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password2: {
                    required: true,
                    equalTo: '#password'
                },
            },
            messages: {
                c_password: {
                    required: "Please enter a Current password",
                },
               
                password: {
                    required: "Please enter a password",
                    minlength: "Please will be minimum 6 characters or numbers"
                },
                required: "Please enter a confirm password",
                equalTo: "Confirm password does not match"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection

