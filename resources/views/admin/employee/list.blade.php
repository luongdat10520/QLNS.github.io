@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/employee/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách nhân viên</h6>
        </div>
        <div class="card-body">
            <div class="d-flex" style="justify-content: space-between">
                <form>
                    <input type="text" name="key_search" value="{{ Request::get('key_search', '') }}"
                        placeholder="Nhập thông tin nhân viên...">
                    <button type="submit" class="btn btn-info">Tìm kiếm</button>
                    @csrf
                </form>
                <form action="{{ route('employees.export') }}" method="GET">
                    <button type="submit" class="btn btn-success">Xuất Excel</button>
                    @csrf
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Họ tên</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Phòng ban</th>
                            <th scope="col" class="text-center">Chức vụ</th>
                            <th scope="col" width="280px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $info)
                            <tr class="row{{ $info->user_id }}">
                                <th scope="row" class="text-center">{{ $info->user_id }}</th>
                                <td class="text-center">{{ $info->name }}</td>
                                <td class="text-center">{{ $info->user->email }}</td>
                                <td class="text-center">{{ $info->department->department_name }}</td>
                                <td class="text-center">{{ $info->position->position_name }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('employees.show', $info->user_id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-primary m-0">
                                                Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('employees.edit', $info->user_id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $info->user_id }}" class="btn btn-danger btn-delete m-0 rounded">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
