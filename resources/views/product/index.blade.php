@extends('layouts.app')
@section('title','Products')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Products List </h1>
   <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>CATEGORY</th>
            <th>IMAGE</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($products as $product)
         <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{!! $product->description !!}</td>
            <td>{{$product->price}} MAD</td>
            <td align="center">
                @if ($product->category)
                   <a href="{{route('categories.show',$product->category_id)}}" class="btn btn-link">
                       <span class="badge bg-primary">
                        {{$product->category->name}}
                       </span>
                   </a>
                @endif
            </td>
            <td>
                 @if ($product->image)
                    <img src="storage/{{$product->image }}" alt="" width="100px">
                 @else
                   <span>No image</span>
                 @endif
            </td>
            <td>
                <div class="btn-group gap-2">
                   <a class="btn btn-primary" href="{{route('products.edit',$product)}}">Update</a>
                   <form action="{{route('products.destroy',$product)}}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger" value="Delete"/>
                   </form>
                </div>

            </td>
         </tr>
        @empty
         <tr>
            <td colspan="6" align="center">
               <h6>No product</h6>
            </td>
         </tr>

        @endforelse
    </tbody>
</table>

{!! $products->links() !!}
@endsection
