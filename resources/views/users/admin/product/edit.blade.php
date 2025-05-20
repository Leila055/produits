@extends('layouts.app')
@section('title','Update product')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>@yield('title') </h2>
        <a href="{{route('products.index')}}" class="btn btn-danger float-end">Back</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
             <div class="alert alert-danger" role="alert">
                <strong>Errors</strong>
                <ul>
                  @foreach ($errors->all() as $error )
                     <li>{{$error}}</li>
                  @endforeach
                </ul>
             </div>
        @endif
    <form action="{{route('products.update',$product)}}" method="POST">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description">{{old('description',$product->description)}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{old('price',$product->price)}}"placeholder="price">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                     @if ($product)
                     <img src="storage/{{$product->image }}" alt="" width="100px">
                    @endif
                </div>
            <div class="col-md-12 col-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

    </form>
    </div>
</div>
@endsection

