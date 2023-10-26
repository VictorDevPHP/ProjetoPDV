<?php

namespace App\Http\Livewire\Cadastro;

use App\Models\Fornecedor;
use Livewire\Component;
use Illuminate\Http\Request;

class CadastroFornecedor extends Component
{
    public function render()
    {
        return view('livewire.cadastro.cadastro-fornecedor');
    }

    public function formFornecedor(Request $request){
        $fornecedor = Fornecedor::create($request->only(['nome','contato', 'cnpj', 'endereco']));
        $fornecedor->save();

        session()->flash('sucesso', $fornecedor->nome .' cadastrado com sucesso');
        return redirect()->route('cadastro-cliente');
    }
}
