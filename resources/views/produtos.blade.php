@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5>Cadastro de Produtos</h5>
            <div class="btn btn-sm">
                <a href="/produtos/criar/" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
            </div>
        </div>
    </div>
@endsection