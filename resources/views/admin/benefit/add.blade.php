@extends('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm Mục Phúc Lợi Nhân Viên</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('benefits.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Phúc Lợi:</label>
                <input type="text" class="form-control" name="benefit_name" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Nội Dung:</label>
                <input type="text" class="form-control" name="description" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Dạng Phúc Lợi:</label>
                <input type="text" class="form-control" name="benefit_type" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Áp Dụng Cho:</label>
                <input type="text" class="form-control" name="applicable_to" value="">
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