@php
    use Illuminate\Support\Facades\Route;
    $isAdminRoute =(Route::is('admin_dashboard'));
    $isCategoriesRoute =(Route::is('categories.*'));
    $isProductsRoute =(Route::is('products.*'));

    $defautClasses= [
         '  list-group-item list-group-item-action'
    ]
@endphp
<div class="list-group">
        <a  @class([ $defautClasses,'active'=> $isAdminRoute]) href="{{route('admin_dashboard')}}">Dashboard</a>
        <a  @class([ $defautClasses,'active'=> $isProductsRoute]) href="{{route('products.index')}}">Products</a>
        <a   @class([ $defautClasses,'active'=> $isCategoriesRoute]) href="{{route('categories.index')}}">Categories</a>

     </div>
