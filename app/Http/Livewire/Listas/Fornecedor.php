<?php

namespace App\Http\Livewire\Listas;

use App\Http\Controllers\Overview;
use Livewire\Component;

class Fornecedor extends Component
{
    public function render()
    {

        $data = (new Overview())->getTotalFornecedores();
        $fornecedores = $data['fornecedores'];

        return view('livewire.listas.fornecedor', compact(
            'fornecedores'
        ));
    }
}
