
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('role.index' )}}" class="btn btn-primary rounded">All Role</a>
    </div>
    
    <h3 class="text-center">Create Role</h3>

    @if(count($errors)>0)
      @foreach($errors->all() as $error)
        <li class="text-danger animate__animated animate__fadeOut animate__delay-5s">{{$error}}</li>
      @endforeach
    @endif

    <form action="{{route('role.store')}}" method="post">
    @csrf

    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" aria-describedby="helpId" >
    </div>
    
    <button class="btn btn-primary btn-block rounded" type="submit">Create Role</button>
    </form>
@endsection