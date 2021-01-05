
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('post.index' )}}" class="btn btn-primary rounded">All Post</a>
    </div>
    <h3 class="text-center">Edit Post</h3>
    <form action="{{route('post.update',[$post->id])}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" value="{{$post->name}}" aria-describedby="helpId" required>
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Update Post</button>
    </form>
@endsection