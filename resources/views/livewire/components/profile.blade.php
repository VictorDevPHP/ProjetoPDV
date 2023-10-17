<div>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <div class="col-md-13">
        <div class="card card-widget widget-user">
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Bem vindo(a), {{ ucfirst(auth()->user()->name) }}!</h3>
                <h5 class="widget-user-desc">{{ ucfirst(auth()->user()->profile) }}</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('vendor/adminlte/dist/img/holder2.jpg') }}"
                    alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">SALES</span>
                        </div>
                    </div>
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">13,000</h5>
                            <span class="description-text">FOLLOWERS</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">PRODUCTS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
