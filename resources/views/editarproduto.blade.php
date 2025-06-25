@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <div class="form-group">
                <form action="/produtos/{{ $prod->id }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nomeProdut">Nome do produto</label>
                        <input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Nome" value="{{ $prod->nome }}">

                        <label for="numEstoque">Quantidade de produtos em estoque</label>
                        <input type="number" name="numEstoque" id="numEstoque" class="form-control" placeholder="Quantidade" min="0" step="1" value="{{ $prod->estoque }}">

                        <label for="precoProduto">Preço do produto</label>
                        <input type="number" name="precoProduto" id="precoProduto" class="form-control" placeholder="Preço" min="0.01" step="0.01" value="{{ $prod->preco }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="javascript:window.location.href = '/produtos'">Cancelar</button>
                </form>
            </div>
        </div>
    </div>    
@endsection