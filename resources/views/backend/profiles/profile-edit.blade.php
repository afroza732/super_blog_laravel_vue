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
                    <h3 class="m-0 text-dark">Edit Profile</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                        <h4 class="m-0 text-dark">Your Profile
                            <a href="{{Route('profiles.view')}}" class="btn btn-sm btn-primary float-right" title="Edit">
                                <i class="fa fa-list">User List</i>
                            </a
                        </h4>
                    </div>
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{Route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
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
                                     <div class="form-group col-md-4">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" name="mobile" value="{{$editUser->mobile}}" class="form-control" id="mobile">
                                        <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" value="{{$editUser->address}}" class="form-control" id="address">
                                        <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="userType" name="gender">
                                            <option value="">Select any</option>
                                            <option value="Male" {{($editUser->gender == 'Male')?'selected' :''}}>Male</option>
                                            <option value="Female" {{($editUser->gender == 'Female')?'selected' :''}}>Female</option>
                                        </select>
                                        <font style="color: red">{{($errors->has('userType'))?($errors->first('userType')):''}}</font>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address">Image</label>
                                        <input type="file" name="image"  id="image">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <img src="{{(!empty($editUser->image))?url('public/upload/user_image/'.$editUser->image):url('public/upload/no-image.png')}}" height="160px" width="150px" id="showImage">
                                    </div>
                                    <div class="form-group col-md-6" style="padding-top: 30px;">

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



