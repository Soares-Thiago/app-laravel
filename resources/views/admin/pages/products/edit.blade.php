@extends('admin.layout.app')

@section('title', 'Editar Produto')
<div class='container'>
    <div class="card text-black bg-light mb-3" >
@section('content')

<h1><a href="{{route('products.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Editar Produto {{$product->name}}</h1>

<form action="{{ route('products.update',$product->id) }}" method = "post">
    @method('PUT')
    @include('admin.pages.products.partils.form')
    </form>   
    </div></div>   
@endsection