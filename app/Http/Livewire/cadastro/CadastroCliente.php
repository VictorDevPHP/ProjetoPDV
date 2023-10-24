<?php

namespace App\Http\Livewire\Cadastro;

use Livewire\Component;
use App\Models\Clientes;
use Illuminate\Http\Request;



class CadastroCliente extends Component
{
    public function render()
    {
        return view('livewire.cadastro.cadastro-cliente');
    }

    public function ClienteSave(Request $request){
        $cliente = Clientes::create($request->only(['nome', 'endereco', 'cpf', 'whatsapp', 'saldo']));
        $cliente->save();

        session()->flash('sucesso', $cliente->nome .' cadastrado com sucesso');
        return redirect()->route('cadastro-cliente');
    }
}
