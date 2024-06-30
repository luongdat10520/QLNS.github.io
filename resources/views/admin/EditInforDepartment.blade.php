@EXTENDS('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập Nhật Thông Tin Phòng Ban</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.update',['id' => $department->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">ID Phòng Ban:</label>
                <input type="text" class="form-control" value="{{$department->id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên Phòng Ban:</label>
                <input type="text" class="form-control" name="department_name" value="{{$department->department_name}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ:</label>
                <input type="text" class="form-control" name="address" value="{{$department->address}}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Số Điện Thoại:</label>
                <input type="tel" class="form-control" name="phone_number" value="{{$department->phone_number}}">
            </div>
            <div>
                <a href="#">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection