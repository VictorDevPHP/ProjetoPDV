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

<div>
    {{-- @dd($produtos_vendidos) --}}
    <div class="card-body">
        <table id="produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID da Venda</th>
                    <th>Produtos</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos_vendidos as $venda)
                    <tr>
                        <td>{{ $venda->id_venda }}</td>
                        <td>
                            <ul>
                                @php
                                    $produtos = $venda->produtos;
                                @endphp
                                @foreach ($produtos as $produto)
                                    <li>
                                        ID - {{ $produto['nome'] }} ------------- {{$produto['quantidade']}}x(R$ {{ $produto['preco'] }})
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $venda->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
