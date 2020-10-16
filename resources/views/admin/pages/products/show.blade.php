<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do Produto
@endsection

@section('content')
    <h1><a href="{{route('products.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do produto</h1>
<hr>
  
<p>Nome: {{$product->name}}</p>
<p>Descrição: {{$product->description}}</p>
<p>Preço: {{$product->price}}</p>
@endsection    

