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
        $produto = null;
        return view('livewire.components.form-produto', compact($produto));
    }

    public function formProduto(Request $request){
        $produto = Produto::create($request->only(['nome', 'preco', 'marca', 'quantidade']));
        $produto->save();
        
        session()->flash('sucesso', 'Produto cadastrado com sucesso');
        return redirect()->route('form-produto');

    }
    public function editar($id){
        $produto = Produto::find($id);
        return view('livewire.components.form-produto', ['produto' => $produto]);
        
    }
    public function update(Request $request, $id){
        $produto = Produto::find($id);
        $produto->update($request->only(['nome', 'preco', 'marca', 'quantidade']));

        session()->flash('sucesso', 'Produto Editado com sucesso');
        return redirect()->route('form-produto');
    }

    
}
