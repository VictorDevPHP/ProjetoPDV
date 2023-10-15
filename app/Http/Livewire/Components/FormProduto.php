<?php

namespace App\Http\Livewire\Components;

use App\Models\Produto;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Events\ProdutoCadastrado;

class FormProduto extends Component
{
    public function render()
    {
        return view('livewire.components.form-produto');
    }

    public function formProduto(Request $request){
        $produto = Produto::create($request->only(['nome', 'preco', 'marca', 'quantidade']));
        $produto->save();
        
        session()->flash('sucesso', 'Produto cadastrado com sucesso');
        return redirect()->route('form-produto');

    }
}
