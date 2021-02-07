@extends('layouts.app')
@section('content')
<h1>All Categories :</h1><br>
<ul class="list-group">
@forelse ( $categories as $category)
   <li class="list-group-item">
       {{$category->name}}
       <a  href="{{route('categories.edit',$category->id)}}"class="btn btn-primary btn-sm float-right">Edit</a>
       <form class="float-right mr-2"method="POST" action="{{route('categories.destroy',$category->id)}}">
        @csrf
        @method('DELETE')
       <input type="submit" class="btn btn-danger btn-sm "value="Delete">
       </form>

   </li>
    
@empty
<li class="list-group-item">
    No Categories 
</li>

@endforelse
<li class="list-group-item">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add New Category</a>
</li>
</ul>
@endsection
