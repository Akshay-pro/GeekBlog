
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
        <a href="{{route('permission.create')}}" class="btn btn-primary rounded">Create Permission</a>
    </div>
    <h3 class="text-center">All Permission</h3>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @forelse($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
            <td>
                <a href="{{route('permission.update',[$permission->id])}}" class="btn btn-warning btn-sm rounded">
                    <i class="material-icons">edit</i>Edit
                </a>
                <form action="{{route('permission.destroy',[$permission->id])}}" method="post">
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
                <td colspan="5" class="text-center">No Permission Found</td>
                  
            </tr>
        @endforelse
    </table>
@endsection