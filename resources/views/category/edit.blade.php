@extends('layouts.app')
@section('title','Update category')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>update category
            <a href="{{route('categories.index')}}" class="btn btn-danger float-end">Back</a>
        </h2>
    </div>
    <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>

            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 md-12" >
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Name">
                </div>
            </div>
            <div class="col-md-12 col-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

