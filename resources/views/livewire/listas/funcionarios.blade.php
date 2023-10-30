<div>
    <div class="card-body">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        @livewireScripts()
        <table id="produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Admissão</th>
                    <th>CPF</th>
                    <th>Contato</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                @if ($funcionarios)
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->nascimento }}</td>
                            <td>{{ $funcionario->admisao }}</td>
                            <td>{{ $funcionario->cpf }}</td>
                            <td>{{ $funcionario->contato }}</td>
                            <td>R${{ $funcionario->salario }}</td>
                            <td>
                                <a href="{{ route('editar-funcionario', ['id' => $funcionario->id]) }}"
                                    class="btn btn-outline-success">Editar Funcionario</a>
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
