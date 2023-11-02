<div class="row mt-5">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireScripts
    <div class="row">
        <div class="col-md-3"> <!-- Botão na mesma largura que os cards -->
            <button class="btn btn-dark btn-block" wire:click="vendaTrintaDias">Filtrar 30 dias</button>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Ultimos 30 Dias</h3>
                    <p>Total R$ {{ $valorTrinta }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3"> <!-- Coluna 2 ocupando metade da largura -->
            <button class="btn btn-dark btn-block" wire:click="vendaQuinzeDias">Filtrar 15 dias</button>
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Ultimos 15 Dias</h3>
                    <p>Total R$ {{ $valorQuinze }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <canvas id="graph"
        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;"
        width="764" height="250" class="chartjs-render-monitor"></canvas>
    <div>
        <input class="" type="date" wire:model="data_inicio" />
        <input type="date" wire:model="data_fim" />
        <button class="btn btn-dark btn-block col-md-2" wire:click="filtroPerVendas">Filtrar</button>
    </div>
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
    @if ($tabelaCarregada)
        <script>
            $(document).ready(function() {
                $('#produtos').DataTable();
            });
        </script>
    @endif
    <script>
        var ctx = document.getElementById('graph').getContext('2d');
        var labels;
        var graph;

        window.addEventListener('labels-updated', function(event) {
            labels = event.detail;
            updateChart();
        });

        function updateChart() {
            if (graph) {
                graph.destroy();
            }
            graph = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels[0], 
                    datasets: [{
                        label: 'Vendas Mensais',
                        data: [12, 19, 3, 5, 2, 10, 4, 5, 19, 15, 11, 2, 13, 14, 15, 16, 17, 18, 19, 20, 19, 18, 17, 17, 16, 14, 18, 19, 10, 10],
                        backgroundColor: 'gray',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Chame a função inicialmente para criar o gráfico com as labels iniciais (se houver)
        updateChart();
    </script>

</div>
