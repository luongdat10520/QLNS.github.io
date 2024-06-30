@extends('layout.main-admin')
@push('styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
@push('scripts')
    {{-- <script src="/js/admin/user/index.js"></script> --}}
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Biến Động Số Lượng Nhân Viên</h6>
                </div>
                <div class="card-body">
                    <div>
                        <h4 class="">Tổng Số Nhân Viên: {{ \App\Models\UserInfo::all()->count() }}</h4>
                        <canvas id="chartStaff2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Lương Nhân Viên</h6>
                </div>
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
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Số Lượng Nhân Viên Theo Phòng Ban</h6>
                </div>
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
                    label: 'Tiền lương theo tháng',
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

        var chartStaff2 = new Chart($('#chartStaff2'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Số Nhân Viên Theo Tháng',
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
        reloadStaffChart2();


        function getRandomRGBColor() {
            let red = Math.floor(Math.random() * 256);
            let green = Math.floor(Math.random() * 256);
            let blue = Math.floor(Math.random() * 256);

            return `rgb(${red}, ${green}, ${blue})`;
        };

        function reloadStaffChart2() {
            $.ajax({
                type: 'GET',
                url: '/api/employees/staff2',
                success: function(res) {
                    let data = res.data;
                    let labelsStaff2 = [];
                    let dataStaff2 = [];
                    let backgroundColorStaff2 = [];
                    let total = 0;

                    data.forEach((e) => {
                        labelsStaff2.push(`${e.month}/${e.year}`);
                        dataStaff2.push(Math.round(e.total_staff));
                        total += parseInt(e.total_staff);
                        backgroundColorStaff2.push(getRandomRGBColor());
                    });

                    chartStaff2.data.labels = labelsStaff2;
                    chartStaff2.data.datasets[0].data = dataStaff2;
                    chartStaff2.data.datasets[0].backgroundColor = backgroundColorStaff2;
                    chartStaff2.update();
                },
            })
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
                    $('.total_salary').text(`Tổng lương: ${formatCash(Math.round(total))} VNĐ`);

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
                    let labelsStaff = [];
                    let dataStaff = [];
                    let backgroundColorStaff = [];

                    data.forEach((e) => {
                        labelsStaff.push(e.department_name);
                        dataStaff.push(e.total_staff);
                        backgroundColorStaff.push(getRandomRGBColor());
                    });

                    staffChart.data.labels = labelsStaff;
                    staffChart.data.datasets[0].data = dataStaff;
                    staffChart.data.datasets[0].backgroundColor = backgroundColorStaff;
                    staffChart.update();
                },
            })
        };
    </script>
@endsection
