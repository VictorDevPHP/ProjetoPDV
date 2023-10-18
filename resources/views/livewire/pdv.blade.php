<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de PDV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <style>
        #carrinho {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    @csrf
    <div class="container mt-5">
        <h1 class="text-center">Frente de Caixa</h1>
        <div class="row mt-4">
            <!-- Lista de Produtos -->
            <div class="col-lg-6 border-right pr-4">
                <h2>Produtos</h2>
                <div class="form-group">
                    <select class="form-control" id="selectProduto" data-placeholder="Selecione um produto">
                        <option value="" disabled selected>Selecione um produto</option>
                        @foreach ($produtos as $produto)
                            @if ($produto->quantidade > 0)
                                <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                                    {{ $produto->id }} - {{ $produto->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn btn-primary mt-2" id="adicionar-ao-carrinho">Adicionar ao Carrinho</button>
                </div>
            </div>
            <div class="col-lg-1 border-left border-right"></div>
            <!-- Carrinho de Compras -->
            <div class="col-lg-5">
                <h2>Carrinho de Compras</h2>
                <ul class="list-group" id="carrinho">
                </ul>
                <h4 class="mt-3 total">Total: $<span id="total">0.00</span></h4>
                <button class="btn btn-success mt-3" id="finalizar-compra" data-toggle="modal"
                    data-target="#modal-pagamento">Finalizar Compra</button>
            </div>
        </div>
    </div>

    <!-- Modal de Pagamento -->
    <div class="modal fade" id="modal-pagamento" tabindex="-1" role="dialog" aria-labelledby="modal-pagamento-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-pagamento-label">Escolha a forma de pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="forma-pagamento">Forma de Pagamento:</label>
                        <select class="form-control" id="forma-pagamento">
                            <option value="dinheiro">Dinheiro</option>
                            <option value="pix">Pix</option>
                            <option value="credito">Cartão de Crédito</option>
                            <option value="debito">Cartão de Débito</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="pagar">Pagar</button>
                </div>
            </div>
        </div>
    </div>
    @csrf
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#selectProduto').select2({
                placeholder: 'Selecione um produto',
            });
        });

        // Fun  ção para adicionar produtos ao carrinho
        // Função para adicionar produtos ao carrinho
        $('#adicionar-ao-carrinho').click(function() {
            var produtoSelecionado = $('#selectProduto option:selected');
            var nome = produtoSelecionado.text();
            var preco = parseFloat(produtoSelecionado.data('preco'));
            var id = parseInt(nome.split(' - ')[0]); 
            var quantidade = 1; 

            var regex = /^(\d+) -/;
            var match = nome.match(regex);
            if (match) {
                quantidade = parseInt(match[1]);
                nome = nome.replace(match[0], '').trim();
            }

            var carrinhoItem = '<li class="list-group-item" data-id="' + id + '" data-quantidade="' + quantidade +
                '">' + nome + ' - $' + (preco * quantidade).toFixed(2) + '</li>';
            $('#carrinho').append(carrinhoItem);

            var total = parseFloat($('#total').text()) + (preco *
                quantidade);
            $('#total').text(total.toFixed(2));
        });
        $('#pagar').click(function() {
            var formaPagamento = $('#forma-pagamento').val();
            var total = parseFloat($('#total').text());
            var produtos = [];

            $('#carrinho li').each(function() {
                var id = parseInt($(this).data('id'));
                var quantidade = parseInt($(this).data('quantidade'));
                var nome = $(this).text();
                var preco = parseFloat(nome.split(' - $')[1]);
                nome = nome.split(' - $')[0];

                var produto = {
                    id: id,
                    nome: nome,
                    preco: preco,
                    quantidade: quantidade,
                };

                produtos.push(produto);
            });
            $.ajax({
                type: 'POST',
                url: '/salvar-venda',
                data: {
                    _token: "{{ csrf_token() }}",
                    formaPagamento: formaPagamento,
                    total: total,
                    produtos: produtos,
                },
                success: function(response) {
                    if (response.success) {
                        alert('Venda salva com sucesso');
                        $('#carrinho').empty();
                        $('#total').text('0.00');
                        $('#modal-pagamento').modal('hide');
                    } else {
                        alert('Erro ao salvar a venda');
                    }
                },
                error: function() {
                    alert('Erro ao conectar-se ao servidor');
                },
            });
        });
    </script>
</body>

</html>
