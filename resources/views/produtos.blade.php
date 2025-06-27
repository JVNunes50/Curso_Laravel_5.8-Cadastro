@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Departamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button">Nova Categoria</button>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" name="nomeProduto" id="nomeProduto" placeholder="Nome do produto" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="quantidadeProduto" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" name="quantidadeProduto" id="quantidadeProduto" placeholder="Quantidade do produto" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" name="precoProduto" id="precoProduto" placeholder="Preço do produto" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="departamentoProduto" class="control-label">Departamento</label>
                            <div class="input-group">
                                <select id="departamentoProduto" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="model-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dissmiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection