@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <div class="form-group">
                <form action="/produtos" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="custom-select mr-sm-2">
                            <option selected>Categorias cadastradas</option>
                            @foreach ($cats as $cat)
                                <option name="categoria_id" value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="nomeProdut">Nome do produto</label>
                    <input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Nome">

                    <label for="numEstoque">Quantidade de produtos em estoque</label>
                    <input type="number" name="numEstoque" id="numEstoque" class="form-control" placeholder="Quantidade">

                    <label for="precoProduto">Preço do produto</label>
                    <input type="number" name="precoProduto" id="precoProduto" class="form-control" placeholder="Preço">
                </form>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="javascript:window.location.href = '/produtos'">Cancelar</button>
        </div>
    </div>    
@endsection