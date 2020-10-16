<!DOCTYPE html>
@extends('admin.layout.app')

@section('title')
Detalhes do Produto
@endsection
<div class='container'>
    <div class="card text-black bg-light mb-3" >
    @section('content')
        <h1><a href="{{route('products.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a>  Detalhes do produto</h1>
    <hr>
    
    <p>Nome: {{$product->name}}</p>
    <p>Descrição: {{$product->description}}</p>
    <p>Preço: {{$product->price}}</p>

    <form action='{{route('products.destroy',$product->id)}}' method='POST'>
        @csrf
        @method('DELETE')
        <button type='submit' class='btn btn-danger'> <i class="fas fa-trash-alt"></i> Deletar</button>
    </div><br>  
</div>  
@endsection    

