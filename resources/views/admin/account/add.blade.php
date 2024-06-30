@extends('layout.main-admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Thêm Tài Khoản</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Mật Khẩu:</label>
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Phân Quyền:</label>
                    <select name="role" id="" class="form-control">
                        <option value="0">Nhân Viên</option>
                        <option value="1">Quản Trị Viên</option>
                    </select>
                </div>
                <div>
                    <a href="#">
                        <button type="submit" name="add" class="btn btn-primary">Thêm Mới</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
