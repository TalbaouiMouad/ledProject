@extends('dashboard.dashboard')
@section('pages')
<div class="container text-light">
<form action='{{route('addProduct')}}' method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label" for="name">Product Name</label>
        <input class="form-control @error('product_name') is-invalid @enderror" type="text" id="name" name="product_name" value="{{old('product_name')}}"  required>
        @error('product_name')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="photo">Product Picture</label>
        <input class="form-control @error('photo') is-invalid @enderror" type="file"  id="photo" name="photo" value="{{old('photo')}}" >
        @error('photo')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group ">
        <label class="form-label" for="longdescription"">Long Description</label>
        <textarea name="long_description" id="longdescription" cols="30" class="form-control" rows="10" value="{{old('long_description')}}" ></textarea>
    </div>
    <div class="form-group">
        <label class="form-label" for="small_description">Small Description</label>
        <input class="form-control @error('small_description') is-invalid @enderror" type="text" id="small_description" name="small_description" value="{{old('small_description')}}" required>
        @error('small_description')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="price"> Price</label>
        <input class="form-control @error('product_price') is-invalid @enderror" type="number" id="price" name="product_price" value="{{old('product_price')}}">
        @error('product_price')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="offerPrice"> Offer Price</label>
        <input class="form-control @error('product_price') is-invalid @enderror" type="number" id="offerPrice" name="product_offerPrice"  @if (!old('product_offerPrice'))value="{{old('product_offerPrice')}}"@else value="0"@endif>
        @error('product_offerPrice')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="amount"> Amount</label>
        <input class="form-control @error('product_amount') is-invalid @enderror" type="number" id="amount" name="product_amount" value="{{old('product_amount')}}">
        @error('product_amount')
                    <x-alert type="danger" :message=$message/>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="publish">Publish Product</label>
        <select class="form-control"name="product_publish" id="publish" required>
            <option  value='1'>Yes</option>
            <option  value='0' selected>Not Yet</option>
        </select>
    </div>
    <div class="form-group text-end">
        <button type='submit' class="btn btn-primary mt-2"> <i class="bi bi-plus"></i>Add Product</button>
    </div>
</form>
</div>
@endsection