<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <div class="card-body">
        <table id="produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>CPF</th>
                    <th>WhatsApp</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                @if ($clientes)
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->whatsapp }}</td>
                            <td>R${{ $cliente->saldo }}</td>
                            <td>
                                <a href="{{ route('editar-cliente', ['id' => $cliente->id]) }}"
                                    class="btn btn-outline-success">Editar Cliente
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum produto encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
