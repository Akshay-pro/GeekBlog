
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('category.index' )}}" class="btn btn-primary rounded">All Category</a>
    </div>
    
    <h3 class="text-center">Create Category</h3>

    @if(count($errors)>0)
      @foreach($errors->all() as $error)
        <li class="text-danger animate__animated animate__fadeOut animate__delay-5s">{{$error}}</li>
      @endforeach
    @endif

    <form action="{{route('category.store')}}" method="post">
    @csrf

    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" aria-describedby="helpId" required>
    </div>
    
    <button class="btn btn-primary btn-block rounded" type="submit">Create Category</button>
    </form>
@endsection