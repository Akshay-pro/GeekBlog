
@extends('adminpanel.layouts.master');

@section('content')
@if(session('success'))
    <div class="animate__animated animate__bounce">
        <div class="alert alert-success animate__animated animate__fadeOut animate__delay-5s" role="alert">
            {{session('success')}}
        </div>
    </div>
@endif
    <dhv class="d-flex justify-content-between">
        <a href="{{route('role.create')}}" class="btn btn-primary rounded">Create Role</a>
    </div>
    <h3 class="text-center">All Roles</h3>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @forelse($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td class="d-flex">
            
            <div>
                <a href="{{route('role.assign.permission',[$role->id])}}" class="btn btn-success btn-sm rounded">
                    <i class="material-icons">connect_without_contact</i>Assign Permission
                </a>    
                <a href="{{route('role.update',[$role->id])}}" class="btn btn-warning btn-sm rounded">
                    <i class="material-icons">edit</i>Edit
                </a>
                
            </div>
            <form action="{{route('role.destroy',[$role->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded">
                        <i class="material-icons">delete</i>Delete
                    </button>
                </form>
               
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No Role Found</td>
                  
            </tr>
        @endforelse
    </table>
@endsection