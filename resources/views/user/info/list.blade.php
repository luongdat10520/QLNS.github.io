@extends('layout.main-user')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/user/info/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Thông tin cá nhân</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Họ tên:</label>
                <input class="form-control" name="" type="text" value="{{ $info->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại:</label>
                <input class="form-control" type="text" value="{{ $info->phone_number }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Phòng ban:</label>
                <input class="form-control" type="text" value="{{ $info->department->department_name }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Chức vụ:</label>
                <input class="form-control" type="text" value="{{ $info->position->position_name }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Ngày sinh:</label>
                <input class="form-control" type="date" value="{{ $info->date_of_birth }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Địa chỉ:</label>
                <input class="form-control" type="text" value="{{ $info?->address }}" disabled>
            </div>
        </div>
    </div>
@endsection
