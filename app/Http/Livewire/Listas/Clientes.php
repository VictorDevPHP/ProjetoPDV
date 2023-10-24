<?php

namespace App\Http\Livewire\Listas;

use Livewire\Component;
use App\Http\Controllers\Overview;


class Clientes extends Component
{
    public function render()
    {
        $data = (new Overview())->getTotalClientes();
        $clientes = $data['clientes'];
        return view('livewire.listas.clientes', compact(
            'clientes',
        ));
    }

}
