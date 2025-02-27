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
                    Sửa sách
                </div>
                <div class="card-body">
                    <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Tên</label>
                            <input type="text" class="form-control @error('title')is-invalid @enderror" placeholder="Title" name="title" id="title"  value="{{old('title',$book->title)}}"/>
                            @error('title')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Tác giả</label>
                            <input type="text" class="form-control @error('author')is-invalid @enderror" placeholder="Author"  name="author" id="author" value="{{old('author',$book->author)}}"/>
                            @error('author')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description" cols="30" rows="5">{{old('description',$book->description)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="Image" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control @error('image')is-invalid @enderror"  name="image" id="image"/>
                            @error('image')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                            @if (!empty($book->image))
                                <img class="w-25 my-3" src="{{asset('uploads/books/cover/'.$book->image)}}" class="img-fluid" alt="">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{($book->status == 1) ? 'selected':''}}>Đang hoạt động</option>
                                <option value="0" {{($book->status == 0) ? 'selected':''}}>Chặn</option>
                            </select>
                        </div>


                        <button class="btn btn-primary mt-2">Update</button>  
                    </form>                   
                </div>
            </div>                           
        </div>
    </div>       
</div>
@endsection
