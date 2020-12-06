@extends('backend.layouts.master')
@section('content')
    <!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
        </div><!-- /.col -->
        @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
        @endif
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sản phẩm mới nhập</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Giá sale</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                     
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->origin_price }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>{{ optional($item->category)->name }}</td>
                               <td>
                                  <img src={{ asset('storage/'.$item->avatar) }} alt="hoddie" class="avt">
                               </td>
                                <td>
                                    <form action="{{ route('backend.product.edit',$item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="GET">
                                        {{-- <a href="{{ route('backend.product.delete',$item->id) }}">Xóa</a> --}}
                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                    </form>
                                </td>
                                <td>
                                   
                                    <form action="{{ route('backend.product.delete',$item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{-- <a href="{{ route('backend.product.delete',$item->id) }}">Xóa</a> --}}
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>

                                    
                                </td>
                            </tr>
                            @endforeach
                            {{ $products->links() }}
                        
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection