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
                    <h3 class="card-title">Chỉnh sửa sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('backend.product.update',$product->id) }}" method="POST">
                    @csrf
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name" value="{{ old('name',$product->name) }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;">
                                {{-- <option>--Chọn danh mục---</option> --}}
                                @foreach($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                               
                                {{-- <option>Máy tính</option>
                                <option>Máy ảnh</option>
                                <option>Phụ kiện</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option>--Chọn thương hiệu---</option>
                                <option>Apple</option>
                                <option>Samsung</option>
                                <option>Nokia</option>
                                <option>Oppo</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="text" class="form-control" placeholder="Điền giá khuyến mại" name="origin_price" value="{{ $product->origin_price }}">
                                </div>
                            </div>
                            @error('origin_sale')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" class="form-control" placeholder="Điền giá gốc" name="sale_price" value="{{ $product->sale_price }}">
                                </div>
                            </div>
                            @error('sale_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{ $product->content }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;" name="status">
                                {{-- <option value="{{ $product->status }}"></option> --}}
                                <option value="1">Đang nhập</option>
                                <option value="2">Mở bán</option>
                                <option value="0">Hết hàng</option>
                            </select>
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