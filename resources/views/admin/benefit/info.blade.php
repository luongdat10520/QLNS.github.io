@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thông Tin Mục Phúc Lợi</h6>
    </div>
    <div class="card-body">
        <form>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ID:</label>
                <input type="text" class="form-control" value="{{ $benefit->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên Mục Phúc Lợi:</label>
                <input type="text" class="form-control" value="{{ $benefit->benefit_name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Nội Dung:</label>
                <input type="text" class="form-control" value="{{ $benefit->description }}" disabled>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Dạng Phúc Lợi:</label>
                <input type="text" class="form-control" value="{{ $benefit->benefit_type }}" disabled>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Áp Dụng Cho:</label>
                <input type="text" class="form-control" value="{{ $benefit->applicable_to }}" disabled>
            </div>
        </form>
    </div>
</div>
@endsection