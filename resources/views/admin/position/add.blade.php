@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm chức vụ</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('positions.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên chức vụ:</label>
                <input type="text" class="form-control" name="position_name" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Lương cơ bản:</label>
                <input type="text" class="form-control" name="base_salary" value="">
            </div>
            <div>
                <a href="#">
                    <button type="submit" name="add" class="btn btn-primary">Thêm Mới</button>
                </a>               
            </div> 
        </form>
    </div>
</div>
@endsection