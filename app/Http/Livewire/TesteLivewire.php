<?php

namespace App\Http\Livewire;

use App\Models\Venda;
use Livewire\Component;
use Carbon\Carbon;

class TesteLivewire extends Component
{
    public $teste = 'Inicial'; 
    public $vendas;
    public $data;
    public $total = 0;
    public $data_inicio;
    public $data_fim;

    public function render()
    {
        return view('livewire.teste-livewire');
    }

    public function atualizarTeste()
    {   
        $this->total = count(Venda::all());

    }
    public function venda2()
    {
        $doisDiasAtras = now()->subDays(2);

        $vendasDosUltimosDoisDias = Venda::where('created_at', '>=', $doisDiasAtras)
        ->where('created_at', '<=', now())
        ->get();
        $this->total = 'nos ultimos dois dias = R$'.$vendasDosUltimosDoisDias->sum('valor_total');
    
    }
    public function filtrarVendas(){
        $dataInicio = Carbon::createFromFormat('Y-m-d', $this->data_inicio)->startOfDay();
        $dataFim = Carbon::createFromFormat('Y-m-d', $this->data_fim)->endOfDay();

        $vendasFiltradas = Venda::where('created_at', '>=', $this->data_inicio)
            ->where('created_at', '<=', $this->data_fim)
            ->get();
        $this->total = $vendasFiltradas;
    }

}
