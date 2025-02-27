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
                    Danh sách đánh giá
                </div>
                <div class="card-body pb-0">   
                    <div class="d-flex justify-content-end">
                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="Keyword">
                                <button type="submit" class="btn btn-primary ms-2">Tìm kiếm</button>
                                <a href="{{route('account.reviews')}}" class="btn btn-secondary ms-2">Xoá</a>
                            </div>
                        </form>
                    </div>          
                    <table class="table  table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Tên</th>
                                <th>Đánh giá</th>
                                <th>Sách</th>
                                <th>Rating</th>
                                <th>Ngày tạo</th> 
                                <th>Trạng thái</th>                                  
                                <th width="100">Hành động</th>
                            </tr>
                            <tbody>
                                @if($reviews->isNotEmpty())
                                @foreach ($reviews as $review)
                                <tr>
                                    <td><b>{{$review->user->name}}</b></td>
                                    <td>{{$review->review}}</td> 
                                    <td>{{$review->book->title}}</td>                                  
                                    <td>{{$review->rating}}</td>
                                    <td>{{\Carbon\Carbon::parse($review->created_at)->format('d M,Y')}}</td>
                                    <td>
                                        @if($review->status == 1)
                                        <span class="text-success">Đang hoạt động</span>
                                        @else 
                                        <span class="text-danger">Chặn</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('account.reviews.edit',$review->id)}}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" onclick="deleteReview({{$review->id}})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                                @endif
                                                                
                            </tbody>
                        </thead>
                    </table>   
                    {{$reviews->links()}}             
                </div>
                
            </div>                
        </div>
    </div>       
</div>
@endsection


@section('script')
<script>
    function deleteReview(id){
        if(confirm('Are you sure you want to delete?')){
            $.ajax({
                url: '{{route("account.reviews.deleteReview")}}',
                type: 'post',
                data: {id:id},
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(response){
                    window.location.href = "{{route("account.reviews")}}";
                }
            });
        }
    }
</script>
@endsection
