
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('role.index' )}}" class="btn btn-primary rounded">All Role</a>
    </div>
    <h3 class="text-center">Edit Role</h3>
    <form action="{{route('role.update',[$role->id])}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" value="{{$role->name}}" aria-describedby="helpId">
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Update Role</button>
    </form>
@endsection