@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($category)?'Update Category Name':'Add A New Category'}}
    </div>
    <div class="card-body">
        <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="POST">
        @csrf
        @if(isset($category))

        @method('PUT')
        @endif
        <div class="form-group">
            <label for="category">Category Name :</label>
            <input value="{{isset($category)?$category->name:''}}" type="text" name="name"
            class="@error('name') is-invalid @enderror form-control"
            placeholder="Add Category Name">
            
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-success form-control">
                {{isset($category)?'Update':'Add'}}
            </button>
        </div>
        </form>
    </div>
</div>
@endsection