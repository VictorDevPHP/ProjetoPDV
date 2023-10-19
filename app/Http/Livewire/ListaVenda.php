<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\Overview;

class ListaVenda extends Component
{
    public function render()
    {
        $vendas = (new Overview())->consultarVendas();
        return view('livewire.lista-venda', compact(
            'vendas',
        ));
    }
}
