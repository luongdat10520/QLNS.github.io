@extends('layout.main-user')
@push('styles')
@endpush
@push('scripts')
    <script src="/js/user/attendance/index.js"></script>
@endpush
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Lịch sử chấm công</h6>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="form-group">
                    <label for="">Từ</label>
                    <input name="from" type="date" value="{{ Request::get('from') }}">
                    <label for="">Đến</label>
                    <input name="to" type="date" value="{{ Request::get('to') }}">
                    @csrf
                    <button type="submit" class="btn btn-info">Tìm</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Ngày</th>
                            <th scope="col" class="text-center">Giờ check in</th>
                            <th scope="col" class="text-center">Trạng thái check in</th>
                            <th scope="col" class="text-center">Giờ check out</th>
                            <th scope="col" class="text-center">Trạng thái check out</th>
                            {{-- <th scope="col" width="280px" class="text-center">Lựa chọn</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr class="row{{ $attendance->id }}">
                                <td scope="row" class="text-center">
                                    {{ date('Y-m-d', strtotime($attendance->created_at)) }}</td>
                                <td class="text-center">{{ date('H:i:s', strtotime($attendance->check_in)) }}</td>
                                <td class="text-center">{!! date('H:i:s', strtotime($attendance->check_in)) > '08:00:00'
                                    ? '<button class="btn btn-danger">Muộn</button>'
                                    : '<button class="btn btn-success">Bình thường</button>' !!}</td>
                                <td class="text-center">{{ date('H:i:s', strtotime($attendance->check_out ?? '00:00:00')) }}</td>
                                <td class="text-center">{!! !empty($attendance->check_out)
                                    ? '<button class="btn btn-success">Bình thường</button>'
                                    : '<button class="btn btn-danger">Quên</button>' !!}
                                </td>
                                {{--<td class="text-center">
                                    <div class="btn-group">
                                         <a href="{{ route('attendances.show', $attendance->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-primary m-0">
                                                Detail
                                            </button>
                                        </a>
                                        <a href="{{ route('attendances.edit', $attendance->id) }}"
                                            class="text-decoration-none mr-3" type="button">
                                            <button class="btn btn-success m-0">
                                                Edit
                                            </button>
                                        </a>
                                        <button data-id="{{ $attendance->id }}" class="btn btn-danger btn-delete m-0">
                                            Delete
                                        </button>
                                    </div>
                                </td>--}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
