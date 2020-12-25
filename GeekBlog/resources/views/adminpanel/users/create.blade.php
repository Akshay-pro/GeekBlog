
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('user.index' )}}" class="btn btn-primary rounded">All User</a>
    </div>
    
    <h3 class="text-center">Create User</h3>
    <form action="{{route('user.store')}}" method="post">
    @csrf

    <div class="form-group">
      <label for="name"></label>
      <input type="text" name="name" id="anme" class="form-control" placeholder="Enter Name" aria-describedby="helpId" required>
    </div>
    <div class="form-group">
      <label for="email"></label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" aria-describedby="helpId" required>
    </div>
    <div class="form-group">
      <label for="password"></label>
      <input type="text" name="password" id="password" class="form-control" placeholder="Enter Password" aria-describedby="helpId" required>
    </div>
    <div class="form-group">
      <label for="roles"></label>
        <select name="role_id" id="roles" class="form-control text-black" >
            @foreach($roles as $role)
              <option value="{{$role->id}}" >{{strtoupper($role->name)}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Create</button>
    </form>
@endsection