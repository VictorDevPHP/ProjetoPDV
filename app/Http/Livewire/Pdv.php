<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Pdv extends Component
{
    public $produtos;
    public function render()
    {
        $produtos = Produto::all();
        return view('livewire.pdv', compact(
            'produtos'
        ));
    }
}
