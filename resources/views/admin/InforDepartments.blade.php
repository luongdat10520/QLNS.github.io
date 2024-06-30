@EXTENDS('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Thông Tin Phòng Ban</h6>
    </div>
    <div class="card-body">
        <form>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">ID Phòng Ban:</label>
                <input type="text" class="form-control" value="{{$department->id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên Phòng Ban:</label>
                <input type="text" class="form-control" value="{{$department->department_name}}" disabled>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ:</label>
                <input type="text" class="form-control" value="{{$department->address}}" disabled>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Số Điện Thoại:</label>
                <input type="tel" class="form-control" value="{{$department->phone_number}}" disabled>
            </div>
        </form>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Họ Tên</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Ngày Sinh</th>
                        <th scope="col" class="text-center">Số Điện Thoại</th>
                        <th scope="col" class="text-center">Địa Chỉ</th>
                        <th scope="col" class="text-center">Chức Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{ $user->id }}</th>
                        <td class="text-center">{{ $user->full_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->date_of_birth }}</td>
                        <td class="text-center">{{ $user->phone_number }}</td>
                        <td class="text-center">{{ $user->address }}</td>
                        <td class="text-center">{{ $user->position->position_name}}</td>
                    </tr>
                    @endforeach;
                </tbody>
        </table>
    </div>
</div>
@endsection