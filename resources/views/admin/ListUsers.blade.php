@EXTENDS('layout.main-admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Danh Sách Nhân Viên</h6>
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
                        <th scope="col" class="text-center">Họ Tên</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phòng Ban</th>
                        <th scope="col" class="text-center">Chức Vụ</th>
                        <th scope="col" width="280px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{ $user->id }}</th>
                        <td class="text-center">{{ $user->full_name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->department->department_name}}</td>
                        <td class="text-center">{{ $user->position->position_name}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('employees.show', $user->id) }}" class="text-decoration-none mr-3" type="button">
                                    <button class="btn btn-primary m-0">
                                    Detail
                                    </button>
                                </a>
                                <a href="{{ route('employees.edit', $user->id) }}" class="text-decoration-none mr-3" type="button">
                                    <button class="btn btn-success m-0">
                                    Edit
                                    </button>
                                </a>                           
                                <form action="{{ route('employees.destroy',$user->id) }}" method="post">
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
        <div class="text-center">
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection

