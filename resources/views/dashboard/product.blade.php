@extends('dashboard.dashboard')
@section('pages')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="d-flex mt-2">
    <h1>Products List</h1>
    <a class="btn btn-success ms-auto " href='{{route('productform')}}'>Add Product</a></div>

@if (count($products)>0)
    <table class="table table-bordered  mt-2 ">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Small Description</th>
            <th scope="col">Long Description</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Publish</th>
            <th scope="col">Picture</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row" width="4%" class="align-middle">{{$product->id}}</th>
            <th class="align-middle">{{$product->product_name}}</th>
            <td class="align-middle">{{$product->small_description}}</td>
            <td class="align-middle w-75">{{$product->long_description}}</td>
            <td class="align-middle">{{$product->product_price}}</td>
            <td class="align-middle">{{$product->product_amount}}</td>
            <td class="align-middle">@if ($product->product_publish)
                <sring>Yes</sring>
                @else 
                <sring>No</sring>
            @endif 
            </td>
            <td  class="align-middle w-50"><img src="{{asset($product->photo)}}" width="100%" alt="{{$product->product_name}}"></td>
            <td  class="align-middle "><div class="row"><a class="btn col btn-danger mx-3 mb-1 " href="{{route('product.delete',['id'=>$product->id])}}"><i class="bi bi-trash"></i></a><a class="btn col btn-success mx-3" href="{{route('product.update',['id'=>$product->id])}}"><i class="bi bi-pencil-square"></i></a></div></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endif

@endsection