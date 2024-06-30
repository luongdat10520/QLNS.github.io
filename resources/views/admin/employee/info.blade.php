@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thông Tin Nhân Viên</h6>
    </div>
    <div class="card-body">
        <form>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ID Nhân Viên:</label>
                <input type="text" class="form-control" value="{{$info->user_id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Họ Tên:</label>
                <input type="text" class="form-control" value="{{$info->name}}" disabled>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Email:</label>
                <input type="text" class="form-control" value="{{$info->user->email}}" disabled>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Ngày Sinh:</label>
                <input type="date" class="form-control" value="{{$info->date_of_birth}}" disabled>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ:</label>
                <input type="text" class="form-control" value="{{$info->address}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Số Điện Thoại:</label>
                <input type="tel" class="form-control" value="{{$info->phone_number}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Phòng Ban:</label>
                <input type="tel" class="form-control" value="{{$info->department->department_name}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Chức Vụ:</label>
                <input type="tel" class="form-control" value="{{$info->position->position_name}}" disabled>
            </div>
        </form>
    </div>
</div>
@endsection