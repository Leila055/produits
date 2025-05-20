@extends('layouts.app')
@section('title','Categories')
@section('content')
<div class="d-flex justify-content-between align-items-center">
<h1>Category:{{$category->name}}</h1>
   <a href="{{route('categories.index')}}" class="btn btn-primary">Go Back</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>Update Product</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product )
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>
                <div class="btn-group gap-2">
                  <a class="btn btn-primary" href="{{route('products.edit',$product)}}">Update</a>
                </div>
            </td>
        </tr>
        @empty
          <tr>
            <td colspan="6" align="center" ><h6>No product for this category</h6></td>
          </tr>
        @endforelse
    </tbody>
</table>
@endsection
