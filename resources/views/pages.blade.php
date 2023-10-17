<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@livewire('components.profile')
<div class="row">
    <div class="col-lg-3 col-6 mx-auto">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $produtos }}</h3>
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
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
