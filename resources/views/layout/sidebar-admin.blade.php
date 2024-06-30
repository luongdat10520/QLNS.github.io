        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-text mx-3">Quản lý</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Quản lý -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quản lý</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Employees"
                    aria-expanded="true" aria-controls="Employees">
                    <i class="fas fa-regular fa-user"></i>
                    <span>Quản lý nhân viên</span>
                </a>
                <div id="Employees" class="collapse" aria-labelledby="headingEmployees" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('employees.index') }}">Danh sách nhân viên</a>
                        <a class="collapse-item" href="{{ route('employees.create') }}">Thêm nhân viên</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#User"
                    aria-expanded="true" aria-controls="User">
                    <i class="fas fa-regular fa-user"></i>
                    <span>Quản lý tài khoản</span>
                </a>
                <div id="User" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('accounts.index') }}">Danh sách tài khoản</a>
                        <a class="collapse-item" href="{{ route('accounts.create') }}">Thêm tài khoản</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Departments"
                    aria-expanded="true" aria-controls="Departments">
                    <i class="fas fa-solid fa-building"></i>
                    <span>Quản lý phòng ban</span>
                </a>
                <div id="Departments" class="collapse" aria-labelledby="headingDepartments"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('departments.index') }}">Danh sách phòng ban</a>
                        <a class="collapse-item" href="{{ route('departments.create') }}">Thêm phòng ban</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#position"
                    aria-expanded="true" aria-controls="position">
                    <i class="fas fa-solid fa-building"></i>
                    <span>Quản lý chức vụ</span>
                </a>
                <div id="position" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('positions.index') }}">Danh sách chức vụ</a>
                        <a class="collapse-item" href="{{ route('positions.create') }}">Thêm chức vụ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Attendance"
                    aria-expanded="true" aria-controls="Attendance">
                    <i class="fas fa-solid fa-briefcase"></i>
                    <span>Quản lý chấm công</span>
                </a>
                <div id="Attendance" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('attendances.attendance') }}">Danh sách chấm công</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ManagementReport"
                    aria-expanded="true" aria-controls="ManagementReport">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý báo cáo</span>
                </a>
                <div id="ManagementReport" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('report.salary') }}">Báo cáo lương</a>
                        <a class="collapse-item" href="{{ route('report.latestaff') }}">Báo cáo đi muộn</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse"
                    data-target="#ManagementStatistic" aria-expanded="true" aria-controls="ManagementStatistic">
                    <i class="fas fa-solid fa-chart-pie"></i>
                    <span>Thống kê dữ liệu</span>
                </a>
                <div id="ManagementStatistic" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('statistics.index')}}">Thống kê nhân viên</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#EmployeeBenefits"
                    aria-expanded="true" aria-controls="EmployeeBenefits">
                    <i class="fas fa-solid fa-table"></i>
                    <span>Phúc lợi nhân viên</span>
                </a>
                <div id="EmployeeBenefits" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('benefits.index') }}">Danh sách phúc lợi</a>
                        <a class="collapse-item" href="{{ route('benefits.create') }}">Thêm mục phúc lợi</a>
                    </div>
                </div>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->
