@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
                <h5>Cadastro de Produtos</h5>
            <p class="fs-5">Produtos cadastrados por categoria.</p>
            @if (count($cats) > 0)
                @foreach ($cats as $cat)
                    <p class="fs-4">{{ $cat->nome }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prods as $prod)
                                @if ($prod->categoria_id == $cat->id)
                                    <tr>
                                        <th scope="row">{{ $prod->id }}</th>
                                        <td>{{ $prod->nome }}</td>
                                        <td>{{ $prod->preco }}</td>
                                        <td>{{ $prod->estoque }}</td>
                                        <td>
                                            <a href="/produtos/editar/{{ $prod->id }}" class="btn btn-sm btn-primary">Editar</a>
                                            <a href="/produtos/apagar/{{ $prod->id }}" class="btn btn-sm btn-danger">Apagar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div>
                        Nenhuma categoria cadastrada
                    </div>
                </div>
            @endif
            <div class="btn btn-sm">
                <a href="/produtos/criar/" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
            </div>
        </div>
    </div>
@endsection