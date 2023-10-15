<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<div>
    <form action="{{ route('formPost') }}" method="POST">
      @csrf
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Novo Produto</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <input class="form-control" name="nome" type="text" placeholder="Nome do Produto" required="required">
                    </div>
                    <div class="col-1">
                        <input class="form-control" name="preco" id="preco" type="number" min="0" step="0.01" placeholder="Preço" required>
                     </div>
                    <div class="col-3">
                        <input class="form-control"  name="marca" type="text" placeholder="Marca" required="required">
                    </div>
                    <div class="col-2">
                     <input class="form-control"  name="quantidade" type="number" placeholder="Quantidade" required="required">
                 </div>
                </div>
            </div>
            <div class="col-1" style="text-align: center">
               <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            @if (session()->has('sucesso'))
               <div class="alert alert-success">
                  {{ session('sucesso') }}
               </div>
            @endif
        </div>
    </form>
</div>
