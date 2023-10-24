<?php

namespace App\Http\Livewire\Cadastro;

use Livewire\Component;
use App\Models\Clientes;
use Illuminate\Http\Request;



class CadastroCliente extends Component
{
    public $id;
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
    public function editarCliente($id){
        $cliente = Clientes::find($id);

        return view('livewire.cadastro.cadastro-cliente', ['cliente' => $cliente]);
    }

    public function clienteUpdate(Request $request, $id){
        $cliente = Clientes::find($id);
        $cliente->update($request->only(['nome', 'endereco', 'cpf', 'whatsapp', 'saldo']));

        session()->flash('sucesso', $cliente->nome .' Atualizado com sucesso');
        return redirect()->route('cadastro-cliente');
    }
}
