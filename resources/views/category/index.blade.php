@extends('layouts.app')
@section('title','Categories')
@section('content')
<div class="d-flex justify-content-between align-items-center">
<h1>Categories List</h1>
   <a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
<</div>
<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($categories as $category )
        <tr>
            <td>{{$category->id}}</td>
             <td>{{$category->name}}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info" href="{{route('categories.show',$category)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('categories.edit',$category)}}">Update</a>
                    <form action="{{route('categories.destroy',$category)}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                       <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" align="center"><h6>No categories</h6></td>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection
