@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/account/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh Sách Tài Khoản</h6>
        </div>
        <div class="card-body">
            <form action="">
                <input type="text" name="key_search" value="{{ Request::get('key_search', '') }}"
                    placeholder="Nhập thông tin tài khoản...">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @csrf
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Tài Khoản</th>
                            <th scope="col" class="text-center">Quyền</th>
                            <th scope="col" class="text-center">Ngày tạo</th>
                            <th scope="col" width="280px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr class="row{{ $account->id }}">
                                <th scope="row" class="text-center">{{ $account->id }}</th>
                                <td class="text-center">{{ $account->email }}</td>
                                <td class="text-center">{{ $account->role == 0 ? 'Nhân viên' : 'Quản trị viên' }}</td>
                                <td class="text-center">{{ $account->created_at }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('accounts.edit', $account->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $account->id }}" class="btn btn-danger btn-delete m-0 rounded">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
