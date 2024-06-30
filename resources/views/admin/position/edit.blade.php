@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập nhật thông tin chức vụ</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('positions.update',['id' => $position->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ID chức vụ:</label>
                <input type="text" class="form-control" value="{{$position->id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên chức vụ:</label>
                <input type="text" class="form-control" name="position_name" value="{{$position->position_name}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Lương cơ bản:</label>
                <input type="text" class="form-control" name="base_salary" value="{{$position->base_salary}}">
            </div>
            <div>
                <a href="#">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection