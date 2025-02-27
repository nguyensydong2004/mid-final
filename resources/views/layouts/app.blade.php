<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Đánh Giá Sách</title>
    
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .header {
            background-color: #3a92f7;
            padding: 15px 0;
        }
        .header h1 a {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .navigation a {
            font-size: 18px;
            padding: 0 10px;
            transition: color 0.3s;
        }
        .navigation a:hover {
            color: #f8d210;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid shadow-lg header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">
                    <a href="{{route('home')}}" class="h3 text-white text-decoration-none">Web Giới thiệu và Đánh giá sách</a>
                </h1>
                <div class="d-flex align-items-center navigation">
                    @if (Auth::check())
                        <a href="{{route('account.profile')}}" class="text-white">Tài khoản của tôi</a>
                    @else
                        <a href="{{route('account.login')}}" class="text-white">Đăng nhập</a>
                        <a href="{{route('account.register')}}" class="text-white ps-3">Đăng ký</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @yield('main')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    @yield('script')
</body>
</html>
