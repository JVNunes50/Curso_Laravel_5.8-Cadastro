@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
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
            <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo Produto</button>
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
                            <label for="categoriaProduto" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select id="categoriaProduto" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function novoProduto(){
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#quantidadeProduto').val('');
            $('#precoProduto').val('');
            $('#dlgProdutos').modal('show');
        }
        function carregarCategorias(){
            $.getJSON('/api/categorias', function(data) {
                console.log(data);
                for(i=0; i<data.length; i++){
                    opcao = '<option value ="' + data[i].id + '">' +data[i].nome + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            });
        }

        function montarLinha(p) {
            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.categoria_id + "</td>" +
                "<td>" + 
                    '<button class="btn btn-xs btn-primary" onclick="editar(' + p.id + ')"> Editar </button>' + 
                    '<button class="btn btn-xs btn-danger" onclick="remover(' + p.id + ')"> Apagar </button>' +
                "</td>" +
                "</tr>";
            return linha;
        }

        function editar(id){
            $.getJSON('/api/produtos/' + id, function(data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#nomeProduto').val(data.nome);
                    $('#quantidadeProduto').val(data.preco);
                    $('#precoProduto').val(data.estoque);
                    $('#categoriaProduto').val(data.categoria_id);
                    $('#dlgProdutos').modal('show');
            });
        }

        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function(){
                    console.log('Apagou, OK');
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter(function(i, elemento){
                        return elemento.cells[0].textContent == id;
                    });
                    if(e){
                        e.remove();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        function carregarProdutos() {
            $.getJSON('/api/produtos', function(produtos){
                for(i=0; i<produtos.length; i++){
                    linha = montarLinha(produtos[i]);
                    $('#tabelaProdutos>tbody').append(linha);
                }
            });
        }

        function criarProduto(){
            prod = { // Os nomes dos objestos devem estar nos atributos do controller create
                nome: $("#nomeProduto").val(), 
                estoque: $("#quantidadeProduto").val(),
                preco: $("#precoProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            };
            $.post("/api/produtos", prod, function(data){
                produto = JSON.parse(data);
                linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);
            });
        }

        function salvarProduto(){
            prod = {
                id: $("#id").val(),
                nome: $("#nomeProduto").val(), 
                estoque: $("#quantidadeProduto").val(),
                preco: $("#precoProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + prod.id,
                context: this,
                data: prod,
                success: function(data){
                    prod = JSON.parse(data);
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter(function(i, elemento){
                        return (elemento.cells[0].textContent == data.id);
                    });
                    if(e) {
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.nome;
                        e[0].cells[2].textContent = prod.estoque;
                        e[0].cells[3].textContent = prod.preco;
                        e[0].cells[4].textContent = prod.categoria_id;
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        $("#formProduto").submit(function(event){
            event.preventDefault();
            if($("#id").val() != ''){   
                salvarProduto();
            }else{
                criarProduto();
            }
            $("#dlgProdutos").modal('hide');
        });

        $(function(){
            carregarCategorias();
            carregarProdutos();
        })
    </script>
@endsection