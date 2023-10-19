<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@livewire('components.profile')
<div class="row">
    <div class="col-lg-3 col-6 mx-auto">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $produtos_quantidade }}</h3>
                <p>Produtos Cadastrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="{{ route('estoque') }}" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6 mx-auto">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $foraEstoque }}</h3>
                <p>Produtos fora de Estoque</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="{{ route('estoque') }}" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-6 mx-auto">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>R${{ $somaVendas }}</h3>
                <p>Total de Vendas no Sistema</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="{{ route('lista-venda') }}" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
