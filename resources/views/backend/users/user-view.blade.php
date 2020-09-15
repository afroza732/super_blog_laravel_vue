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
                                        <h3 class="m-0 text-dark">User List
                                        <a href="{{Route('users.add')}}" class="btn btn-sm btn-primary float-right" title="Edit">
                                            <i class="fa fa-plus-circle">Add User</i>
                                        </a
                                        </h3>
                                    </div>
                                    <!-- Custom tabs (Charts with tabs)-->
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Role</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($allData as $key => $user)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$user->userType}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-primary" title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{route('users.delete',$user->id)}}" class="btn btn-sm btn-danger" title="Delete" id="delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                    </tfoot>
                                                </table>
                                                </div><!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.card -->
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                    @endsection