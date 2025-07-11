@extends('layouts.app')
@section('title','Products')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Last Products</h1>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 d-flex justify-content-between align-items-center">
    @foreach ($products as $product )
         <div class="col ">
             <div class="card h-100">
                <img class="card-img-top" src="storage/{{$product->image}}" width="100" alt="">
                <div class="card-body">
                   <h5 class="card-title">{{ $product->name }}</h5>
                   <p class="card-text">{{$product->description}}</p>
                   <hr>
                   <div class="d-flex justify-content-between">
                      <span>
                         Price:<span class="badge bg-primary" >{{$product->price}} MAD</span>
                      </span>
                    </div>
                    <span >
                         Category:<span class="badge bg-primary" >{{$product->category->name}} </span>
                    </span>
                </div>
                <div class="card-footer">
                   <small class="text-muted">{{$product->created_at}}</small>
                </div>
             </div>
         </div>
</div>
    @endforeach
@endsection
