@extends('layout.main-user')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Chấm công nhân viên</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('attendances.store') }}">
                @if ($attendance)
                    <div class="">Check-in time: {{ $attendance->check_in }}</div>
                    @if ($attendance->check_out)
                        <div class="">Check-out time: {{ $attendance->check_out }}</div>
                    @endif
                @endif
                <div class="my-3 text-center">
                    <button type="submit" name="check_in" value="1" class="btn btn-danger"
                        {{ !empty($attendance->check_in) ? 'disabled' : '' }}>Check-In</button>
                    <button type="submit" name="check_out" value="1" class="btn btn-danger"
                        {{ empty($attendance->check_in) ? 'disabled' : '' }}>Check-Out</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
