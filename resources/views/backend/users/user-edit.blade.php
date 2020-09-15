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
                    <h3 class="m-0 text-dark">Manage User</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <h4 class="m-0 text-dark">Add User
                            <a href="{{Route('users.view')}}" class="btn btn-sm btn-primary float-right" title="Edit">
                                <i class="fa fa-list">User List</i>
                            </a
                        </h4>
                    </div>
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{Route('users.update')}}" id="myForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="userType">User Role</label>
                                        <select class="form-control" id="userType" name="userType">
                                            <option value="">Select Role</option>
                                            <option value="admin" {{($editUser->userType == 'admin')?'selected' :''}}>Admin</option>
                                            <option value="user" {{($editUser->userType == 'user')?'selected' :''}}>User</option>
                                        </select>
                                        <font style="color: red">{{($errors->has('userType'))?($errors->first('userType')):''}}</font>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" value="{{$editUser->name}}" class="form-control" id="name">
                                        <input type="hidden" name="id" value="{{$editUser->id}}">
                                        <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{$editUser->email}}" class="form-control" id="email">
                                        <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
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
            @endsection

