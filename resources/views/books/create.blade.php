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
                <div class="card-header  text-white">
                    Thêm sách
                </div>
                <div class="card-body">
                    <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Tên</label>
                            <input type="text" class="form-control @error('title')is-invalid @enderror" placeholder="Title" name="title" id="title"  value="{{old('title')}}"/>
                            @error('title')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Tác giả</label>
                            <input type="text" class="form-control @error('author')is-invalid @enderror" placeholder="Author"  name="author" id="author" value="{{old('author')}}"/>
                            @error('author')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description" cols="30" rows="5">{{old('description')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="Image" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control @error('image')is-invalid @enderror"  name="image" id="image"/>
                            @error('image')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Đang hoạt động</option>
                                <option value="0">Chặn</option>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-2">Tạo</button>  
                    </form>                   
                </div>
            </div>                           
        </div>
    </div>       
</div>
@endsection
