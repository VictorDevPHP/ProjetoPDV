<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<div>
    <form wire:submit.prevent="atualizarProduto" method="POST">
        @csrf
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    @if(empty($produto) || $produto == null)
                        Novo Produto
                    @elseif (isset($produto))
                        Editar Produto
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <input class="form-control" name="nome" type="text" placeholder="Nome do Produto" required="required" @if(isset($produto->nome)) value="{{ $produto->nome }}" @endif>
                    </div>
                    <div class="col-1">
                        <input class="form-control" name="preco"  id="preco" type="number" min="0" step="0.01" placeholder="Preço" required @if(isset($produto->preco)) value="{{ $produto->preco }}" @endif>
                    </div>
                    <div class="col-3">
                        <input class="form-control"  name="marca" type="text" placeholder="Marca" required="required" @if(isset($produto->marca)) value="{{ $produto->marca }}" @endif>
                    </div>
                    <div class="col-2">
                        <input class="form-control" name="quantidade" type="number" placeholder="Quantidade" required="required" @if(isset($produto->quantidade)) value="{{ $produto->quantidade }}" @endif>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-1">
                    @if (empty($produto) || $produto == null)
                        <button type="submit" class="btn btn-primary" wire:change='formProduto'>Cadastrar</button>
                    @elseif(isset($produto))   
                        <button type="submit" class="btn btn-primary" wire:change='update'>Editar</button>
                    @endif 
                </div>
                <div class="col-1" style="text-align: center">
                    <a class="btn btn-primary" href="{{ route('estoque') }}">Estoque</a>
                </div>
            </div>                      

            @if (session()->has('sucesso'))
                <div class="alert alert-success">
                    {{ session('sucesso') }}
                </div>
            @endif
        </div>
    </form>
</div>

