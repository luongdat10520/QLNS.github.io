@extends('layout.main-admin')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/admin/user/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách nhân viên đi làm muộn</h6>
        </div>
        <div class="card-body">
            <div class="" style="display: flex;justify-content:space-between">
                <form action="" method="get">
                    <div class="form-group">
                        <label for="">Từ</label>
                        <input name="from" type="date" value="{{ Request::get('from') ?? date('Y-m-01') }}">
                        <label for="">Đến</label>
                        <input name="to" type="date" value="{{ Request::get('to') ?? date('Y-m-d') }}">
                        <input type="text" name="key_search" value="{{ Request::get('key_search', '') }}"
                            placeholder="Nhập thông tin nhân viên...">
                        <button type="submit" class="btn btn-info">Tìm</button>
                        @csrf
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID nhân viên</th>
                            <th scope="col" class="text-center">Họ tên</th>
                            <th scope="col" class="text-center">Tên chức vụ</th>
                            <th scope="col" class="text-center">Phòng Ban</th>
                            <th scope="col" class="text-center">Số ngày đi muộn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $from = Request::get('from');
                            $to = Request::get('to');
                        @endphp
                        @foreach ($users as $user)
                            <tr class="">
                                <th scope="row" class="text-center">{{ $user->id }}</th>
                                <td class="text-center">{{ $user->info->name }}</td>
                                <td class="text-center">{{ $user->info->position->position_name }}</td>
                                <td class="text-center">{{ $user->info->department->department_name }}</td>
                                <td class="text-center">{{ \App\Helpers\Helper::get_late_day_by_id($user->id, $from, $to) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
