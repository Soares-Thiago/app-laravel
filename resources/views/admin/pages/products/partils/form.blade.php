
@include('admin.includes.alerts') 
{{-- token do lavarel --}}
@csrf
{{--old('name') retorna o valro antigo do name antes de dar erro por ex --}}
<div class='form-group'>
    <input type="text" class='form-control' name="name" placeholder="Digite o nome" value="{{$product->name ?? old('name')}}">
</div>
<div class='form-group'>
    <input type="text" class='form-control' name="description" placeholder="Digite a descrição" value="{{$product->description ??old('description')}}">
</div>

<div class='form-group'>
    <input type="number" step='0.01' class='form-control' name="price" placeholder="Digite o preço" value="{{$product->price ??old('price')}}">
</div>

<div class='form-group'>  
    <input type="file" class='form-control' name='foto'>
</div>

<button type="submit" class='btn btn-success'><i class="fas fa-plus"></i> Enviar</button>