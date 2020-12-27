
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('category.index' )}}" class="btn btn-primary rounded">All Category</a>
    </div>
    <h3 class="text-center">Edit Category</h3>
    <form action="{{route('category.update',[$category->id])}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" value="{{$category->name}}" aria-describedby="helpId" required>
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Update Category</button>
    </form>
@endsection