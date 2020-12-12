@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Tạo sản phẩm</li>
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
                    <h3 class="card-title">Tạo sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="" placeholder="Điền tên sản phẩm " name="name">
                        </div>
                        @error('name')
                            <div class="alert alert-danger origin">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Danh mục </label>
                            <select class="form-control select2" style="width: 100%;" name="parent_id">
                                <option value="0">--Chọn danh mục---</option>
                               {!! $option !!}
                               {{-- <option value="1">bag</option> --}}
                                {{-- <option>Máy tính</option>
                                <option>Máy ảnh</option>
                                <option>Phụ kiện</option> --}}
                            </select>
                            @error('parent_id')
                        <div class="alert alert-danger origin">{{ $message }}</div>
                    @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" name="color" placeholder="Điền màu sắc">
                        </div>
                        <div class="form-group">
                            <label>Size</label>
                            <select class="form-control select2" style="width: 100%;" name="size">
                                <option value="0">Chọn size</option>
                                <option value="0">S</option>
                                <option value="1">M</option>
                                <option value="1">L</option>
                                <option value="1">XL</option>
                                <option value="1">XXL</option>
                                <option value="1">XXXL</option>

                            </select>
                            {{-- <input type="text" class="form-control" name="size" placeholder="điền kích thước quần áo"> --}}
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá gốc</label>
                                    <input type="text" class="form-control" placeholder="Điền giá gốc" name="origin_price">
                                </div>
                                @error('origin_price')
                                    <div class="alert alert-danger origin">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" class="form-control" placeholder="Điền giá bán" name="sale_price">
                                </div>
                                @error('sale_price')
                                     <div class="alert alert-danger origin">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"  id="exampleInputFile" name="images[]" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                               
                            </div>
                            @error('images')
                            <div class="alert alert-danger origin">{{ $message }}</div>
                       @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select class="form-control select2" style="width: 100%;" name="status">
                                <option >--Chọn trạng thái---</option>
                                <option value="1">Mới</option>
                                <option value="2">Sale</option>
                                <option value="0">Hết hàng</option>
                            </select>
                        </div>
                        @error('status')
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