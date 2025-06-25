@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5>Cadastro de Produtos</h5>
            <div class="btn btn-sm">
                <a href="/produtos/criar/" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
            </div>
            @if (count($cats) > 0)
                @foreach ($cats as $cat)
                    <p class="fs-4">{{ $cat->nome }}</p>
                    <div class="d-flex p-2">
                        <ul class="list-group">
                            @foreach ($prods as $prod)
                                @if ($prod->categoria_id == $cat->id)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex p-2">Id: {{ $prod->id }}</div>
                                        <div class="d-flex p-2">Nome: {{ $prod->nome }}</div>
                                        <div class="d-flex p-2">{{ $prod->preco }}</div>
                                        <div class="d-flex p-2"><span class="badge bg-primary rounded-pill">{{ $prod->estoque }}</span></div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div>
                        Nenhuma categoria cadastrada
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection