@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tạo danh mục sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                <li class="breadcrumb-item active">Tạo danh mục sản phẩm</li>
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
                    <h3 class="card-title">Tạo danh mục sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('backend.category.store') }}" method="POST">
                    @csrf
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" id="" placeholder="Điền tên danh mục " name="name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Danh mục cha </label>
                            <select class="form-control select2" style="width: 100%;" name="parent_id">
                                <option value="0">--Chọn danh mục---</option>
                               {!! $option !!}
                               {{-- <option value="1">bag</option> --}}
                                {{-- <option>Máy tính</option>
                                <option>Máy ảnh</option>
                                <option>Phụ kiện</option> --}}
                            </select>
                        </div>
                        @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        
                        
                        
                        
                    </div>
                   
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-sucess">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection