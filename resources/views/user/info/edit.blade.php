@extends('layout.main-user')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/user/info/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật thông tin cá nhân</h6>
        </div>
        <form action="{{route('info.update')}}" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Họ tên:</label>
                    <input class="form-control" type="text" name="name" value="{{ $info?->name }}" >
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại:</label>
                    <input class="form-control" type="text" name="phone_number" value="{{ $info?->phone_number }}" >
                </div>
                <div class="form-group">
                    <label for="">Ngày sinh:</label>
                    <input class="form-control" type="date" name="date_of_birth" value="{{ $info?->date_of_birth }}" >
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ:</label>
                    <input class="form-control" type="text" name="address" value="{{ $info?->address }}" >
                </div>
                <button class="btn btn-success" type="submit" style="text-align: right">Lưu</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
