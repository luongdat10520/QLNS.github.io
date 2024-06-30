@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/position/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách chức vụ</h6>
        </div>
        <div class="card-body">
            <form action="">
                <input type="text" name="key_search" value="{{ Request::get('key_search', '') }}"
                    placeholder="Nhập thông tin chức vụ...">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @csrf
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Tên chức vụ</th>
                            <th scope="col" class="text-center">Lương cơ bản</th>
                            <th scope="col" width="280px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $position)
                            <tr class="row{{ $position->id }}">
                                <th scope="row" class="text-center">{{ $position->id }}</th>
                                <td class="text-center">{{ $position->position_name }}</td>
                                <td class="text-center">{{ $position->base_salary }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('positions.show', $position->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-primary m-0">
                                                Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('positions.edit', $position->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $position->id }}" class="btn btn-danger btn-delete m-0">
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
