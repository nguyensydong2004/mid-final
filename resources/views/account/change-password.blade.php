@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9">
            @include('layouts.message')
            <div class="card border-0 shadow">
                <div class="card-header text-white">
                    Thay đổi mật khẩu
                </div>
                <div class="card-body">
                    <form action="{{ route('account.changePassword') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old password" name="old_password" id="old_password" />
                            @error('old_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New password" name="new_password" id="new_password" />
                            @error('new_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="Confirm new password" name="new_password_confirmation" id="new_password_confirmation" />
                            @error('new_password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <button class="btn btn-primary mt-2">Cập nhập</button>
                    </form>                   
                </div>
            </div>                           
        </div>
        
    </div>       
</div>
@endsection
