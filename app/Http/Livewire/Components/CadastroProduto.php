<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Produto;
use Illuminate\Http\Request;

class CadastroProduto extends Component
{
    public $mostrarPopup = false;
    public function render(){
        return view('livewire.components.cadastro-produto')->extends('layouts.app');
    }

    public function FormProduto(){
        return view('livewire.components.formProduto');
    }

}
