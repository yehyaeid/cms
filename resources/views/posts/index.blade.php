@extends('layouts.app')
@section('content')
<h1>All Posts :</h1><br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ( $posts as $post)
       
         
     
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td><img src="{{asset('storage/'.$post->image)}}" alt=""width='50px'height='50px'></td>
        <td>
              @if(!$post->trashed())
                   <a  href="{{route('posts.edit',$post->id)}}"class="btn btn-primary btn-sm float-right">Edit</a>
              @endif 
              @if($post->trashed()){
                <a  href="{{route('restoreposts',$post->id)}}"class="btn btn-primary btn-sm float-right">Restore</a>

              }
              @endif

            <form class="float-right mr-2"method="POST" action="{{route('posts.destroy',$post->id)}}">
             @csrf
             @method('DELETE')
            <input type="submit" class="btn btn-danger btn-sm "value={{$post->trashed()?'Delete':'Trash'}}>
            </form>
     

        </td>
      </tr>
      @empty
      <tr>
         <td> No Posts</td>
      </tr>
      
      @endforelse 
      <tr>
        <td> <a href="{{route('posts.create')}}" class="btn btn-success">Add New Post</a></td>
     </tr>
       
     
    </tbody>

  </table>
  
@endsection