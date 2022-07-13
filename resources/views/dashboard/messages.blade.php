@extends('dashboard.dashboard')
@section('pages')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="d-flex mt-2">
    <h1 class="text-white">Messages</h1>
    <a class="btn btn-success ms-auto " href='#'>Add Product</a></div>

@if (count($messages)>0)
    <table class="table table-bordered  mt-2 ">
        <thead>
            <tr>
            <th scope="row">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject </th>
            <th scope="col">Message</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($messages as $message)
        <tr>
            <th scope="row" width="4%" class="align-middle">{{$message->id}}</th>
            <th class="align-middle">{{$message->name}}</th>
            <td class="align-middle">{{$message->email}}</td>
            <td class="align-middle">{{$message->subject}}</td>
            <td class="align-middle  w-75">{{$message->message}}</td>
            <td  class="align-middle "><div class="row"><a class="btn col btn-danger mx-3 mb-1 " href="#"><i class="bi bi-trash"></i></a><a class="btn col btn-success mx-3" href="#"><i class="bi bi-pencil-square"></i></a></div></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @endif

@endsection