@extends('layouts.app')
@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($post)?'Update Post Name':'Add A New Post'}}
    </div>
    <div class="card-body">
        <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}"
             method="POST"
             enctype="multipart/form-data">
        @csrf
        @if(isset($post))

        @method('PUT')
        @endif

        <div class="form-group">
            <label for="posts title">Title :</label>
            <input value="{{isset($post)?$post->title:''}}" type="text" name="title"
            class="@error('title') is-invalid @enderror form-control"
            placeholder="add new Post Title">
            
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="posts description"> Description:</label>
            <textarea
             rows="2"
             value="" 
            type="text" name="description"
            class="@error('description') is-invalid @enderror form-control"
            placeholder="add new Post description">{{isset($post)?$post->description :''}}</textarea>

            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror    
        </div>
        <div class="form-group">
            <label for="posts Category"> Category :</label>
            <select name="category_id">

                <option value="1">category 1 </option>
                <option value="2">category 2 </option>

              </select>
   
        </div>

        <div class="form-group">
            <label for="posts content"> Content:</label>         
            <input id="x" 
            class="@error('content') is-invalid @enderror form-control"
            value="{{isset($post)?$post->content :''}}" 
            type="hidden" 
            name="content">
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
            <trix-editor input="x"></trix-editor>
        </div>
        @if(isset($post))

            <img src="{{asset('storage/'.$post->image)}}" class="image"alt=""width='100px'height='100px'>
            @endif
        <div class="form-group">
            <label for="posts Image"> Image:</label>
            
            <input  type="file" name="image"
                class="@error('image') is-invalid @enderror form-control">
                    
            @error('image')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        </div>

        <div class="form-group">
            <button class="btn btn-success form-control">
                {{isset($post)?'Update':'Add'}}
            </button>
        </div>
        </form>
    </div>
</div>
@endsection
@section('s')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous"></script>
    
@endsection

