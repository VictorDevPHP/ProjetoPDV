<?php

namespace App\Http\Livewire\Cadastro;

use App\Models\Funcionarios;
use Livewire\Component;
use Illuminate\Http\Request;

class CadastroFuncionario extends Component
{
    public function render()
    {
        return view('livewire.cadastro.cadastro-funcionario');
    }

    public function formFuncionario(Request $request){
        $funcionario = Funcionarios::create($request->only(['nome', 'nascimento', 'admissao', 'salario', 'contato', 'cpf']));
        $funcionario->save();

        session()->flash('sucesso', $funcionario->nome .' cadastrado com sucesso');
        return redirect()->route('form-funcionario');
    }

    public function editarFuncionario($id){
        $funcionario = Funcionarios::find($id);
        return view('livewire.cadastro.cadastro-funcionario', ['funcionario' => $funcionario]);

    }

    public function funcionarioUpdate(Request $request, $id){
        $funcionario = Funcionarios::find($id);
        $funcionario->update($request->only(['nome', 'nascimento', 'admissao', 'salario', 'contato', 'cpf']));

        session()->flash('sucesso', $funcionario->nome .' Atualizado com sucesso');
        return redirect()->route('form-funcionario');
    }
}
