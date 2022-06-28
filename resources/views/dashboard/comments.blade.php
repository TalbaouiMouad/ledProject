@extends('dashboard.dashboard')
@section('pages')
<h1>Comments</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h1 class="mt-2">Comments List</h1>
@if (count($comments)>0)
    <table class="table mt-2 ">
        <thead >
            <tr>
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Image</th>
            <th scope="col">Author Email</th>
            <th scope="col">Comment</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td scope="row" class="align-middle">{{$comment->product_id}}</td>
            <td class="align-middle">
            @foreach($products as $product) 
                @if ($product->id==$comment->product_id)
                {{$product->product_name}}
                @endif 
            @endforeach</td>
            <td  class="align-middle">
                @foreach($products as $product) 
                @if ($product->id==$comment->product_id)
               <img href="{{$product->photo}}" alt="{{$product->product_name}}"/>
                @endif 
            @endforeach</td>
            <td class="align-middle">@foreach($users as $user) 
                @if ($user->id==$comment->author_id)
                {{$user->email}}
                @endif 
            @endforeach</td>
            <td class="align-middle">{{$comment->message}}</td>
             <td  class="align-middle "><div class="row"><a class="btn col btn-danger mx-3 " href="{{route('comment.delete',['id'=>$comment->id])}}"><i class="bi bi-pencil-square"></i></a></div></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endif

@endsection