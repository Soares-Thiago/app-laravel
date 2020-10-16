@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1> <a href="{{route('products.index')}}" class='btn btn-primary'> <i class="fas fa-arrow-left"></i></a> Cadastrar Novo Produto</h1>
{{-- caso n passe no validade do ProductController--}}
@include('admin.includes.alerts') 

<form action="{{ route('products.store') }}" method = "post" enctype="multipart/form-data" class='form'>
    {{-- token do lavarel --}}
    @csrf
    {{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
        <div class='form-group'>
            <input type="text" class='form-control' name="name" placeholder="Digite o nome" value="{{old('name')}}">
        </div>
        <div class='form-group'>
            <input type="text" class='form-control' name="description" placeholder="Digite a descrição" value="{{old('descricao')}}">
        </div>

        <div class='form-group'>
            <input type="number" step='0.01' class='form-control' name="price" placeholder="Digite o preço" value="{{old('price')}}">
        </div>

        <div class='form-group'>  
            <input type="file" class='form-control' name='foto'>
        </div>

        <button type="submit" class='btn btn-success'><i class="fas fa-plus"></i> Enviar</button>
    </form>   
@endsection