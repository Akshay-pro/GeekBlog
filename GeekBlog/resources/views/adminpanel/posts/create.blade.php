
@extends('adminpanel.layouts.master');

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{route('post.index' )}}" class="btn btn-primary rounded">All Post</a>
    </div>
    
    <h3 class="text-center">Create Post</h3>

    @if(count($errors)>0)
      @foreach($errors->all() as $error)
        <li class="text-danger animate__animated animate__fadeOut animate__delay-5s">{{$error}}</li>
      @endforeach
    @endif

    <form action="{{route('post.store')}}" method="post">
    @csrf

    <div class="form-group">
      <label for="title">Title</label>
      <input 
        type="text" 
        name="title" 
        id="title" 
        class="form-control" 
        placeholder="Enter Post Title" 
        aria-describedby="helpId" 
        required
      >
    </div>
    <div class="form-group">
      <label for="post_content">Content Here</label>
      <textarea name="post_content" id="post_content" class="form-control" placeholder="Enter description of your post" col="15" rows="6"></textarea>
    </div>
    <div class="form-group">
      <label for="excerpt">Excerpt</label>
      <textarea name="excerpt" id="excerpt" class="form-control" placeholder="Enter Excerpt of your post (optional)" col="15" rows="4"></textarea>
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select name="category_id" class="form-control" id="category_id">
          <option value="0" >Select Category </option>
          @forelse($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @empty
            
          @endforelse
      </select>
    </div>

    <label for="form-image-input">Featured Image</label>
    <div class="form-image">
      <input type="file" style="display:none" id="form-image-input" onChange="previewImage(this)">
      <p onClick="document.querySelector('#form-image-input').click()">Upload Image Here</p>
    </div>

    <div id="previewBox" style="display:none">
      <img alt="" id="previewImg">
      <i class="material-icon">delete</i>
    </div>

    <button class="btn btn-info rounded-pill" type="submit" name="status" value="draft" >Save Post</button>
    <button class="btn btn-primary rounded-pill" type="submit" name="status" value="publish" >Publish Post</button>
    </form>
@endsection

@section('styles')
      <style>
          .form-image{
              width:50%;
              height:130px;   
              border:2px dashed black;
            }
          .form-image p{
              width:100%;
              height:100%;
              text-align:center;
              line-height:130px;
            }
      </style>
      
@endsection

@section('scripts')
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

  <script>
      CKEDITOR.replace( 'post_content', {
        filebrowserUploadUrl:"{{route('post.image',['_token'=>csrf_token()])}}",
        filebrowserUploadMethod:"form"
      });

      function previewImage(input){
        if(input.files&&input.files[0]){
          let reader=new FileReader();
          
          reader.onload=function(e){
            
            $('#previewImg').attr('src',reader.result);
            $('#previewImg').css('display','block');
          }
          $('.form-image').css('display','none');
        }
      }
  </script>
@endsection

