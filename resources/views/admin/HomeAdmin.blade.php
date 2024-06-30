@extends('layout.main-admin')
@push('styles')
    <style>
        .info-box-content {
            display: flex;
            justify-content: center
        }

        .info-box-icon {
            padding: 10px 20px;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
@push('scripts')
@endpush
@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Số Nhân Viên</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\UserInfo::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-regular fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số Phòng Ban</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Department::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-solid fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Số Chức Vụ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\Position::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số Tài Khoản</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Models\User::all()->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-regular fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lương Nhân viên</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Từ</label>
                        <input id="from" onchange="reloadSalaryChart()" type="date">
                        <label for="">Đến</label>
                        <input id="to" onchange="reloadSalaryChart()" type="date">
                    </div>
                    <div>
                        <h4 class="total_salary">Tổng Lương: 0 VNĐ</h4>
                        <canvas id="salaryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Số Lượng Nhân Viên</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <canvas id="staffChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var salaryChart = new Chart($('#salaryChart'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Tiền Lương Theo Tháng',
                    data: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var staffChart = new Chart($('#staffChart'), {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Nhân Viên Theo Phòng Ban',
                    data: [],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            },
        });

        reloadSalaryChart();
        reloadStaffChart();

        function getRandomRGBColor() {
            let red = Math.floor(Math.random() * 256);
            let green = Math.floor(Math.random() * 256);
            let blue = Math.floor(Math.random() * 256);

            return `rgb(${red}, ${green}, ${blue})`;
        };

        function reloadSalaryChart() {
            let from = $('#from').val();
            let to = $('#to').val();
            $.ajax({
                type: 'GET',
                url: '/api/employees/salary?from=' + from + '&to=' + to,
                success: function(res) {
                    let data = res.data;
                    let labelsRevenue = [];
                    let dataRevenue = [];
                    let backgroundColorRevenue = [];
                    let total = 0;

                    data.forEach((e) => {
                        labelsRevenue.push(`${e.month}/${e.year}`);
                        dataRevenue.push(Math.round(e.total_salary));
                        total += parseInt(e.total_salary);
                        backgroundColorRevenue.push(getRandomRGBColor());
                    });
                    $('.total_salary').text(`Tổng Lương: ${formatCash(Math.round(total))} VNĐ`);

                    salaryChart.data.labels = labelsRevenue;
                    salaryChart.data.datasets[0].data = dataRevenue;
                    salaryChart.data.datasets[0].backgroundColor = backgroundColorRevenue;
                    salaryChart.update();
                },
            })
        };

        function formatCash(str) {
            str = str.toString();
            if (str && str !== "0") {
                return str
                    .split("")
                    .reverse()
                    .reduce((prev, next, index) => {
                        return (index % 3 ? next : next + ".") + prev;
                    });
            }

            return str;
        }

        function reloadStaffChart() {
            $.ajax({
                type: 'GET',
                url: '/api/employees/staff',
                success: function(res) {
                    let data = res.data;
                    console.log(res);
                    let labelsStaff = [];
                    let dataStaff = [];
                    let backgroundColorStaff = [];

                    data.forEach((e) => {
                        labelsStaff.push(e.department_name);
                        dataStaff.push(e.total_staff);
                        backgroundColorStaff.push(getRandomRGBColor());
                    });

                    console.log(labelsStaff, dataStaff, backgroundColorStaff);

                    staffChart.data.labels = labelsStaff;
                    staffChart.data.datasets[0].data = dataStaff;
                    staffChart.data.datasets[0].backgroundColor = backgroundColorStaff;
                    staffChart.update();
                },
            })
        };
    </script>
@endsection
