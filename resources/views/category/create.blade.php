@extends('base')
@section('title','Create category')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>
            Create category
            <a class="btn btn-danger float-end" href="{{route('categories.index')}}">Back</a>
        </h2>
    </div>
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
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-12 col-12 text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </form>


</div>
@endsection


