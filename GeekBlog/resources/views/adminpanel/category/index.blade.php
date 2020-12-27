
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
        <a href="{{route('category.create')}}" class="btn btn-primary rounded">Create Category</a>
        <a href="{{route('category.trashed')}}" class="btn btn-danger rounded">Trashed</a>
    </div>
    <h3 class="text-center">All Category</h3>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        @forelse($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
                <a href="{{route('category.update',[$category->id])}}" class="btn btn-warning btn-sm rounded">
                    <i class="material-icons">edit</i>Edit
                </a>
                <form action="{{route('category.destroy',[$category->id])}}" method="post">
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
                <td colspan="5" class="text-center">No Category Found</td>
                  
            </tr>
        @endforelse
    </table>
@endsection