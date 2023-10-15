<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
<script>
    let table = new DataTable('#produtos');
</script>

@livewire('components.cadastro-produto')
<div>
    <table id="produtos" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Marca</th>
            </tr>
        </thead>
        <tbody>
            @if ($produtos)
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->marca }}</td>
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
