<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;

class Estoque extends Component
{


    public function render()
    {
        $produtos = Produto::all();
        return view('livewire.estoque', compact('produtos'))->extends('layouts.app');
    }
}
