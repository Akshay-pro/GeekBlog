
@extends('adminpanel.layouts.master');

@section('content')
@if(session('success'))
    <div class="animate__animated animate__bounce">
        <div class="alert alert-success animate__animated animate__fadeOut animate__delay-5s" role="alert">
            {{session('success')}}
        </div>
    </div>
@endif
    <div class="d-flex justify-content-between">
        <a href="{{route('post.create')}}" class="btn btn-primary rounded">Create Post</a>
        <a href="{{route('post.trashed')}}" class="btn btn-danger rounded">Trashed</a>
    </div>
    <h3 class="text-center">Deleted Post</h3>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        @forelse($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->name}}</td>
            <td>{{$post->slug}}</td>
            <td>
                <form action="{{route('post.restore',[$post->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm rounded">
                        <i class="material-icons">restore</i>Restore
                    </button>
                </form>
                <form action="{{route('post.perma.delete',[$post->id])}}" method="post">
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
                <td colspan="5" class="text-center">No Post Found</td>
                  
            </tr>
        @endforelse
    </table>
@endsection