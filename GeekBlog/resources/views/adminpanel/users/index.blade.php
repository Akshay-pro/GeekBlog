
@extends('adminpanel.layouts.master');

@section('content')
    <dhv class="d-flex justify-content-between">
        <a href="{{route('user.create')}}" class="btn btn-primary rounded">Create User</a>
    </div>
    <h3 class="text-center">All Users</h3>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @forelse($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>Admin</td>
            <td>
                <a href="" class="btn btn-warning btn-sm rounded">
                    <i class="material-icons">edit</i>Edit
                </a>
                <a href="" class="btn btn-danger btn-sm rounded">
                    <i class="material-icons">delete</i>Delete
                </a>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No User Found</td>
                  
            </tr>
        @endforelse
    </table>
@endsection