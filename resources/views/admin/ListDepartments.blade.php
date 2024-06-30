@EXTENDS('layout.main-admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Danh Sách Phòng Ban</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div>
                @if(session('show_message'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 3000);
                </script>
                @endif
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Tên Phòng Ban</th>
                        <th scope="col" class="text-center">Địa Chỉ</th>
                        <th scope="col" class="text-center">Số Điện Thoại</th>
                        <th scope="col" width="280px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <th scope="row" class="text-center">{{ $department->id }}</th>
                        <td class="text-center">{{ $department->department_name }}</td>
                        <td class="text-center">{{ $department->address }}</td>
                        <td class="text-center">{{ $department->phone_number }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('departments.show',$department->id)}}" class="text-decoration-none mr-3" type="button">
                                    <button class="btn btn-primary m-0">
                                    Detail
                                    </button>
                                </a>
                                <a href="{{route('departments.edit',$department->id)}}" class="text-decoration-none mr-3" type="button">
                                    <button class="btn btn-success m-0">
                                    Edit
                                    </button>
                                </a>
                                <form action="{{ route('departments.destroy',$department->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>                          
                            </div>
                        </td>
                    </tr>
                    @endforeach;
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection