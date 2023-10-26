<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    @livewireScripts
    @livewireStyles

    <div class="card-body">
        <table id="produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Contato</th>
                </tr>
            </thead>
            <tbody>
                @if ($fornecedores)
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->id}}</td>
                            <td>{{ $fornecedor->nome}}</td>
                            <td>{{ $fornecedor->endereco }}</td>
                            <td>{{ $fornecedor->cnpj}}</td>
                            <td>{{ $fornecedor->contato}}</td>
                            <td>
                                <a href="#" class="btn btn-outline-success">Editar Fornecedor</a>
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