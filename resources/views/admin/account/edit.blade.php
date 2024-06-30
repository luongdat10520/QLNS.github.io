@extends('layout.main-admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Cập Nhật Thông Tin Tài Khoản</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.update', ['id' => $user->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password" value="1">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Phân quyền:</label>
                    <select name="role" id="" class="form-control">
                        <option value="0" {{$user->role == 0 ? 'selected' : '' }}>Nhân viên</option>
                        <option value="1" {{$user->role == 1 ? 'selected' : '' }}>Quản trị viên</option>
                    </select>
                </div>
                <div>
                    <a href="#">
                        <button type="submit" name="add" class="btn btn-primary">Lưu</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
