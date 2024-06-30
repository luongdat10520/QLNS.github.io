@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Cập Nhật Thông Tin Mục Thưởng Phạt</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('benefits.update',['id' => $benefit->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ID:</label>
                <input type="text" class="form-control" value="{{ $benefit->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên Mục Phúc Lợi:</label>
                <input type="text" class="form-control" name="benefit_name" value="{{ $benefit->benefit_name }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Nội Dung:</label>
                <input type="text" class="form-control" name="description" value="{{ $benefit->description }}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Dạng Phúc Lợi:</label>
                <input type="text" class="form-control" name="benefit_type" value="{{ $benefit->benefit_type }}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Áp Dụng Cho:</label>
                <input type="text" class="form-control" name="applicable_to" value="{{ $benefit->applicable_to }}">
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