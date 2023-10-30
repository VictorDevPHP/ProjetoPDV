<div>
    <button class="btn btn-dark" wire:click="atualizarTeste">Todas de vendas</button>
    <button class="btn btn-dark" wire:click="venda2">Total de vendas dos ultimos dois dias</button>
    <div>
        <input  class="" type="date" wire:model="data_inicio" />
        <input type="date" wire:model="data_fim" />
        <button wire:click="filtrarVendas">Filtrar</button>
    </div>
    
    <h3>Total de vendas no sistema {{$total}}</h3>
</div>

