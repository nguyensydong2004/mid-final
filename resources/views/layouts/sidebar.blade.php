<div class="card border-0 shadow-lg">
    <div class="card-header bg-primary text-white">
        Chào mừng, {{Auth::user()->name}}!                     
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            @if (Auth::user()->image != "")
                <img src="{{asset('uploads/profile/cover/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="Ảnh đại diện">                            
            @endif
        </div>
        <div class="h5 text-center">
            <strong>{{Auth::user()->name}}</strong>
            <p class="h6 mt-2 text-muted">
                {{ Auth::user()->reviews->count() }} 
                {{ (Auth::user()->reviews->count() > 1) ? 'Bài đánh giá' : 'Bài đánh giá' }}
            </p>
        </div>
    </div>
</div>

<div class="card border-0 shadow-lg mt-3">
    <div class="card-header bg-primary text-white">
        Điều hướng
    </div>
    <div class="card-body sidebar">
        <ul class="nav flex-column">
            @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a href="{{route('books.index')}}" class="nav-link"><i class="fas fa-book"></i> Quản lý Sách</a>                               
            </li>
            <li class="nav-item">
                <a href="{{route('account.reviews')}}" class="nav-link"><i class="fas fa-star"></i> Quản lý Đánh giá</a>                               
            </li>
            @endif
            
            <li class="nav-item">
                <a href="{{route('account.profile')}}" class="nav-link"><i class="fas fa-user"></i> Hồ sơ</a>                               
            </li>
            <li class="nav-item">
                <a href="{{route('account.myReviews')}}" class="nav-link"><i class="fas fa-comment"></i> Đánh giá của tôi</a>
            </li>
            <li class="nav-item">
                <a href="{{route('account.changePasswordForm')}}" class="nav-link"><i class="fas fa-lock"></i> Đổi mật khẩu</a>
            </li> 
            <li class="nav-item">
                <a href="{{route('account.logout')}}" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </li>                           
        </ul>
    </div>
</div>
