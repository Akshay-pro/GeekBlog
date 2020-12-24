
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('user.index' )}}" class="btn btn-primary rounded">All User</a>
    </div>
    <h3 class="text-center">Edit User</h3>
    <form action="{{route('user.update',[$user->id])}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" value="{{$user->name}}" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="email"></label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}" aria-describedby="helpId">
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Update</button>
    </form>
@endsection