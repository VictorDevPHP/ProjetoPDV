<div>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#produtos').DataTable();
        });
    </script>
    <div class="card-body">
        <table id="produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Venda</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Forma De Pagamento</th>
                    <th>Venda Detalhada</th>
                </tr>
            </thead>
            <tbody>
                @if ($vendas)
                    @foreach ($vendas as $venda)
                        <tr>
                            <td> {{ $venda->id_venda }}</td>
                            <td> R${{ $venda->valor_total }}</td>
                            <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $venda->forma_pagamento }}</td>
                            <td>
                                <a href="{{ route('produtos-vendidos') }}" class="btn btn-outline-success">Ver</a>
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
