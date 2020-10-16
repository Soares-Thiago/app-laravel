<!-- importando o template-->
@extends('admin.layout.app')

<!-- importando o template, onde tem contetn ele substitui por isso-->
@section('title')
    Gestão de Produtos
@endsection

@section('content')
<br>
<div class="card bg-light mb-3">
    <div class="card-header">
        <h1>Listagem de Produtos</h1>
    </div>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('products.create') }}" class='btn btn-success'><i class="fas fa-plus"></i> Cadastrar</a></h5>
        <p class="card-text">
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
                        <td><a class='btn-sm btn-primary' href='{{route('products.show',$product->id)}}'><i class="far fa-eye"></i></a>
                            <a class='btn-sm btn-success' href='{{route('products.edit',$product->id)}}'><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        </tr>
                
                    @endforeach
        
                </tbody>
            </table>
            {{$products->links()}}
        </p>
    </div>
</div>
   
@endsection