<?php

namespace App\Http\Livewire\Listas;

use App\Http\Controllers\Overview;
use Livewire\Component;

class Funcionarios extends Component
{
    public function render()
    {
        $data = (new Overview())->getTotalFuncionarios();
        $funcionarios = $data['funcionarios'];

        return view('livewire.listas.funcionarios', compact(
            'funcionarios'
        ));
    }
}
