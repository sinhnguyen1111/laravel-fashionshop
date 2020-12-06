@extends('backend.layouts.master')
@section('content')
    <!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh mục sản phẩm</h1>
            @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('success') }}</div>
        @endif
        </div><!-- /.col -->
       
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
                    <h3 class="card-title">Danh mục sản phẩm</h3>

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
                                <th>Tên danh mục</th>
                                <th>Parent_id</th>
                               
                                <th>Mô tả</th>
                                <th>Hoạt động</th>
                            </tr>
                           
                        </thead>
                        <tbody>
                            @foreach ( $categories as $value )
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->parent_id }}</td>
                                <td><span class="tag tag-success">Approved</span></td>
                                <td>
                                    <a href="{{ route('backend.category.edit',$value->id) }}">Sửa</a>
                                    <a href="{{ route('backend.category.delete',$value->id) }}">Xóa</a>
                                </td>
                                {{-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                            </tr>
                            @endforeach
                            {{ $categories->links() }}
                       
                       
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