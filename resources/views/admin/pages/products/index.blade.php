<!-- importando o template-->
@extends('admin.layout.app')

<!-- importando o template, onde tem contetn ele substitui por isso-->
@section('title')
    Gestão de Produtos
@endsection

@section('content')
    <h1>Listagem de Produtos</h1>
    <hr>
    <a href="{{ route('products.create') }}" class='btn btn-success'><i class="fas fa-plus"></i> Cadastrar</a>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th width='100'>Ações</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                <td><a href='{{route('products.show',$product->id)}}'>Detalhes</a></td>
                </tr>
        
            @endforeach

        </tbody>
    </table>
   {{$products->links()}}
   
@endsection