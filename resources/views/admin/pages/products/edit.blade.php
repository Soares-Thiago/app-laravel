@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
<b>Editar Produto {{$id}}</b>

<form action="{{ route('products.update',$id) }}" method = "post">
    @method('PUT')
    @csrf
        <input type="text" name="name" placeholder="Digite o nome">
        <input type="text" name="descricao" placeholder="Digite a descrição">
        <button type="submit">Enviar</button>
    </form>   
@endsection