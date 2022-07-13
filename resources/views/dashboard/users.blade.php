@extends('dashboard.dashboard')
@section('pages')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="d-flex mt-2">
    <h1 class="text-white">Users List</h1>
    <a class="btn btn-success ms-auto" role="button" href="{{route('dashboard.addAdmin')}}">Add Admin</a>
    </div>
    @if (count($users)>0)
    <table class="table mt-2">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <th>{{$user->name}}</th>
            <td>{{$user->email}}</td>
            <td>@if ($user->is_admin)
                <span>Admin</span>
            @else
                <span>Client</span>
            @endif</td>
            <td><a class="btn btn-danger" role="button" href="{{route('user.delete',['id'=>$user->id])}}">Delete</a></td>
          </tr>
            
        @endforeach
               </tbody>
    </table>
        @endif
     
   
@endsection