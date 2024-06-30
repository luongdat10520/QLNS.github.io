        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.index')}}">
                <div class="sidebar-brand-text mx-3">Nhân viên</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Nhân viên -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Nhân viên</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#InformationUser"
                    aria-expanded="true" aria-controls="InformationUser">
                    <i class="fas fa-regular fa-user"></i>
                    <span>Thông tin cá nhân</span>
                </a>
                <div id="InformationUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('info.show')}}">Xem thông tin cá nhân</a>
                        <a class="collapse-item" href="{{route('info.edit')}}">Cập nhật thông tin</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#WorkAttendance"
                    aria-expanded="true" aria-controls="WorkAttendance">
                    <i class="fas fa-solid fa-briefcase"></i>
                    <span>Chấm công công việc</span>
                </a>
                <div id="WorkAttendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('attendances.create')}}">Chấm công</a>
                        <a class="collapse-item" href="{{route('attendances.index')}}">Lịch sử chấm công</a>
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
                        <a class="collapse-item" href="{{ route('benefits.list') }}">Danh sách phúc lợi</a>
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
