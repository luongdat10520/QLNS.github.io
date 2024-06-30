@extends('layout.main-admin')
@push('styles')
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Danh sách chấm công trong ngày</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID Nhân Viên</th>
                            <th scope="col" class="text-center">Họ Tên</th>
                            <th scope="col" class="text-center">Ngày</th>
                            <th scope="col" class="text-center">Giờ check in</th>
                            <th scope="col" class="text-center">Trạng thái check in</th>
                            <th scope="col" class="text-center">Giờ check out</th>
                            <th scope="col" class="text-center">Trạng thái check out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr class="">
                                <td class="text-center">{{$attendance->user_id}}</td>
                                <td class="text-center">{{optional($attendance->user)->name}}</td>
                                <th scope="row" class="text-center">
                                    {{ date('Y-m-d', strtotime($attendance->created_at)) }}</th>
                                <td class="text-center">{{ date('H:i:s', strtotime($attendance->check_in)) }}</td>
                                <td class="text-center">{!! date('H:i:s', strtotime($attendance->check_in)) > '08:00:00'
                                    ? '<button class="btn btn-danger">Muộn</button>'
                                    : '<button class="btn btn-success">Bình thường</button>' !!}</td>
                                <td class="text-center">{{ date('H:i:s', strtotime($attendance->check_out)) }}</td>
                                <td class="text-center">{!! !empty($attendance->check_out)
                                    ? '<button class="btn btn-success">Bình thường</button>'
                                    : '<button class="btn btn-danger">Quên</button>' !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
