@extends('layouts.app')
@section('title','Create product')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>
           @yield('title')
            <a class="btn btn-danger float-end" href="{{route('products.index')}}">Back</a>
        </h1>
    </div>
</div>
<div class="card-body">
    {{-- affichage des erreurs --}}
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Errors</strong>
        <ul >
            @foreach ($errors->all() as $error )
            <li >{{$error}}</li>

            @endforeach
        </ul>
    </div>
    @endif
    {{-- ... --}}
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                 <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $product->name ?? '') }}"
>
            </div>
                <div class="form-group">
                    <label for="description"class="form-label" >Description</label>
                    <textarea  name="description" id="description" class="form-control" placeholder="Enter Description">{{old('description', $product->description ?? '')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" step="0.5" class="form-control"  value=" {{old('price',$product->price ?? '')}}">
                </div>
                 <div class="form-group">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">Select Category</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                              </option>
                          @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                    @if (!empty($product) && $product->image)
                       <img src="storage/{{$product->image }}" alt="" width="100px">
                    @endif
                </div>
                <div class="form-group my-3">
                    <input type="submit" class="btn btn-primary w-100" value="Register"/>
                </div>


    </form>


</div>
@endsection


