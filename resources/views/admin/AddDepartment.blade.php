@EXTENDS('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thêm Phòng Ban</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Phòng Ban:</label>
                <input type="text" class="form-control" name="department_name" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ:</label>
                <input type="text" class="form-control" name="address" value="">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Số Điện Thoại:</label>
                <input type="tel" class="form-control" name="phone_number" value="">
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