@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/benefit/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh Sách Mục Phúc Lợi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Tên Mục Phúc Lợi</th>
                            <th scope="col" class="text-center">Nội Dung</th>
                            <th scope="col" class="text-center">Dạng Phúc Lợi</th>
                            <th scope="col" class="text-center">Áp Dụng Cho</th>
                            <th scope="col" width="280px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr class="row{{ $benefit->id }}">
                                <th scope="row" class="text-center">{{ $benefit->id }}</th>
                                <td class="text-center">{{ $benefit->benefit_name }}</td>
                                <td class="text-center">{{ $benefit->description }}</td>
                                <td class="text-center">{{ $benefit->benefit_type }}</td>
                                <td class="text-center">{{ $benefit->applicable_to }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('benefits.show', $benefit->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-primary m-0">
                                                Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('benefits.edit', $benefit->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $benefit->id }}" class="btn btn-danger btn-delete m-0 rounded">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach;
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
