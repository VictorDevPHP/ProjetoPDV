<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#produtos').DataTable();
    });
</script>

@livewire('components.cadastro-produto')
<div class="card-body">
    <table id="produtos" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($produtos)
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->marca }}</td>
                        <td class="col-2">
                            <a href="{{ route('formEditar', ['id' => $produto->id]) }}" class="btn btn-block btn-outline-success">Editar</a>
                            <button class="btn btn-block btn-outline-danger">Excluir</button>
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
