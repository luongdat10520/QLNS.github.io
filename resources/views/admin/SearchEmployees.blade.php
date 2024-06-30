<!-- @EXTENDS('layout.main-admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Tìm Kiếm Nhân Viên</h6>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('employees.search') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Nhân Viên:</label>
                <input type="text" name="full_name" value="{{ request('full_name') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Email:</label>
                <input type="text" name="email" value="{{ request('email') }}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Tên Phòng Ban:</label>
                <input type="text" name="department_name" value="{{ request('department_name') }}">
            </div>
            <div>
                <a href="#">
                    <button type="submit" class="btn btn-success">Tìm Kiếm</button>
                </a>
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
                        <th scope="col" class="text-center">Action</th>
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
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('employees.show',$user->id)}}" class="text-decoration-none mr-3" type="button">
                                    <button class="btn btn-primary m-0">
                                    Detail
                                    </button>
                                </a>                       
                            </div>
                        </td>
                    </tr>
                    @endforeach;
                </tbody>
        </table>
    </div>
</div>
@endsection -->