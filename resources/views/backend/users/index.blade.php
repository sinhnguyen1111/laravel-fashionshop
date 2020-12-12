@extends('backend.layouts.master')
@section('content')
    <!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách người dùng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
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
                    <h3 class="card-title">Danh sách người dùng</h3>
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
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
                            <th>Email</th>
                            <th>Tên</th>
                            <th class="avatar">Avatar</th>
                            <th>Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $value )
                                
                           
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->email }}</td>
                            <td><a href="{{ route('backend.userInfo',$value->id) }}">{{ $value->name }}</a></td>
                            <td>
                               <img src="{{ asset('storage/'.$value->profile_photo_path) }}" alt="avatar" class="image">
                            </td>
                            {{-- <td>{{ $value->created_at }}</td> --}}
                            {{-- <td>{{ $value->role }}</td> --}}
                            <td>
                                {{-- <a href="{{ route('backend.userInfo',$value->id) }}">Thông tin chi tiết</a> --}}
                                <a href="{{ route('backend.user.edit',$value->id) }}">Sửa</a>
                                <form action="{{ route('backend.user.delete',$value->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-delete" data_id="{{ $value->id }}">
                                        Xóa
                                </button>
                            </form>
                                {{-- <a href="{{ route('backend.user.delete',$value->id) }}" class="btn-delete" data_id="{{ $value->id }}">Xóa</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        {{ $users->links() }}
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