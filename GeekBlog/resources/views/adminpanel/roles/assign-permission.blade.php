
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
        <a href="{{route('role.index' )}}" class="btn btn-primary rounded">All Role</a>
    </div>
    
    <h3 class="text-center">Assign Permission to {{$role->name}}</h3>
    <form action="{{route('role.store.permission',[$role->id])}}" method="post">
        @csrf
        @forelse($permissions as $permission)
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>
                            <label for="permission">{{$permission->name}}</label>
                        </td>
                        <td class="text-right">
                            <input 
                                type="checkbox" 
                                name="permission[]"  
                                id="permission" 
                                value="{{$permission->id}}"
                                @if($role->hasPermissionTo($permission->id)) checked @endif
                            >
                        </td>
                    </tr>
                </table>
            </div>
            @empty
            <p>No permission yet</p>
        @endforelse
        <button type="submit" class="btn btn-primary btn-block">Assign Permission</button>
    </form>
@endsection