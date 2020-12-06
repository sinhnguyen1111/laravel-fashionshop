@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Chỉnh sửa sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Tạo sản phẩm</li>
                <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa người dùng</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('backend.user.update',$users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng</label>
                            <input type="text" class="form-control" id="" name="name" value="{{ $users->name }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" id="" name="password" value="{{ $users->password }}">
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  id="exampleInputFile" name="avatar" >
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-sucess">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection