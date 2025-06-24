@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <select class="custom-select mr-sm-2">
                <option selected>Categorias cadastradas</option>
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
            <form action="/produtos" method="post">
                <label for="nomeProdut">Nome do produto</label>
                <input type="text" name="nomeProduto" id="nomeProduto">

                <label for="numEstoque">Quantidade de produtos em estoque</label>
                <input type="number" name="numEstoque" id="numEstoque">

                <label for="precoProduto">Preço do produto</label>
                <input type="number" name="precoProduto" id="precoProduto">
            </form>
        </div>
    </div>    
@endsection