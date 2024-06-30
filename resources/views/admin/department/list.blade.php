@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/department/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh Sách Phòng Ban</h6>
        </div>
        <div class="card-body">
            <form action="">
                <input type="text" name="key_search" value="{{ Request::get('key_search', '') }}"
                    placeholder="Nhập thông tin phòng ban...">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @csrf
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Tên Phòng Ban</th>
                            <th scope="col" class="text-center">Địa Chỉ</th>
                            <th scope="col" class="text-center">Số Điện Thoại</th>
                            <th scope="col" width="280px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr class="row{{ $department->id }}">
                                <th scope="row" class="text-center">{{ $department->id }}</th>
                                <td class="text-center">{{ $department->department_name }}</td>
                                <td class="text-center">{{ $department->address }}</td>
                                <td class="text-center">{{ $department->phone_number }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('departments.show', $department->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-primary m-0">
                                                Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('departments.edit', $department->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $department->id }}" class="btn btn-danger btn-delete m-0 rounded">
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
