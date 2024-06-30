<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khôi phục mật khẩu</title>
</head>

<body>
    <h2>Mật khẩu mới của bạn là: {{ $new_password }}</h2>
    <h4>Bấm vào đây để quay lại trang đăng nhập: 
        <a href="{{ env('DOMAIN_FE', 'http://localhost:8000') }}/login">
        Đăng nhập
        </a>
    </h4>
</body>

</html>
