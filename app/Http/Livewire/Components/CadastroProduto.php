<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Produto;

class CadastroProduto extends Component
{
    public function render(){
        return view('livewire.components.cadastro-produto')->extends('layouts.app');
    }
}
