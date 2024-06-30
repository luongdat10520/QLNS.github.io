<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quên mật khẩu</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5 text-center">
                                   <div class="form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Khôi phục mật khẩu</h1>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user email"
                                            name="email" aria-describedby="emailHelp"
                                            placeholder="Nhập email của bạn">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-confirm text-center my-2">
                                        Xác nhận
                                    </button>
                                    </div>
                                    <div class="text-left">
                                        <code class="font-italic">Đăng nhập bằng tài khoản nhân viên được cấp</code>
                                    </div>
                                    <div class="text-left">
                                        <code class="font-italic">Điện thoại hỗ trợ:</code>
                                        <code>
                                            <p class="font-italic text-danger">09xxxxxxxxx - 092xxxxxxxx</p>
                                        </code>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <p>2023 © DATN-LHĐ. Bảo lưu mọi quyền.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <div class="Toastify"></div>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        $('.btn-confirm').on('click', function() {
            let email = $('.email').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('recover') }}",
                data: {
                    email: email,
                },
                success: function(res) {
                    if (res.status == 0) {
                        $('.form').html('');
                        $('.form').html(`
                        <h1 class="h4 text-gray-900 mb-4"> Mật khẩu đã được gửi về </h1>
                                    <a class="" href="#">${email}</a>
                        `);
                    } else {
                        toastr.error(res.message, 'Thông báo');
                    }
                }
            })
        });
    </script>

</body>

</html>
