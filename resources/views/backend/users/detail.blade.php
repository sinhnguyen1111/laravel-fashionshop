<!DOCTYPE html>
<html>
    <body>
        <h3>Thông tin chi tiết</h3>
        <form action="{{ route('backend.user.index') }}" method="GET">
            <button class="btn btn-primary">Danh sách</button>

        </form>
        <ul>
            @foreach ($user_info as $value)
            {{-- <li><img src="{{  asset('storage/'.$value->avatar) }}" alt="avatar"></li> --}}
            <li>Họ tên: {{ $value->fullname }}</li>
            <li>Địa chỉ: {{ $value->address }}</li>
          
            @endforeach
           
        </ul>

    </body>
</html>