
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('permission.index' )}}" class="btn btn-primary rounded">All Permission</a>
    </div>
    <h3 class="text-center">Edit Permission</h3>
    <form action="{{route('permission.update',[$permission->id])}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" value="{{$permission->name}}" aria-describedby="helpId" required>
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Update Permission</button>
    </form>
@endsection