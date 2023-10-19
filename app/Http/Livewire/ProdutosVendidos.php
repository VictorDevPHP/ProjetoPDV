<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Venda;
use App\Http\Controllers\Overview;

class ProdutosVendidos extends Component
{   
    public $data;
    public function render()
    {
        $this->data = (new Overview())->getTotalVenda();
        $produtos_vendidos = $this->data['produtos'];

        // dd($produtos_vendidos);


        return view('livewire.produtos-vendidos', compact(
            'produtos_vendidos',
        ));
    }
}
