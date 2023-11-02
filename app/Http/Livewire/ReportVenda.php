<?php

namespace App\Http\Livewire;

use App\Models\Venda;
use Livewire\Component;
use Carbon\Carbon;

class ReportVenda extends Component
{
    public $vendas;
    public $data_fim;
    public $data_inicio;
    public $tabelaCarregada = false;
    public $valorTrinta;
    public $valorQuinze;
    public $valorPer;
    public $totalGeral;
    public $totalGeralQuinze;
    public $chartData = [
        'labels' => [],
        'datasets' => [
            [
                'label' => 'Vendas Mensais',
                'data' => [],
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ]
        ]
    ];
    public function render()
    {
        $this->valor = $this->totalGeral;
        return view('livewire.report-venda');

    }

    public function vendaTrintaDias()
    {
        $this->vendas = Venda::whereDate('created_at', '>=', Carbon::now()->subDays(30))->get();

        $this->totalGeral = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeral += $venda->valor_total;
        }
        $this->valorTrinta = $this->totalGeral;
        $this->tabelaCarregada = true;
    }


    public function vendaQuinzeDias()
    {
        $this->vendas = Venda::whereDate('created_at', '>=', Carbon::now()->subDays(15))->get();
        dd($this->vendas);
        $this->totalGeralQuinze = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeralQuinze += $venda->valor_total;
        }
        $this->valorQuinze = $this->totalGeralQuinze;
        $this->tabelaCarregada = true;
    }
    public function filtroPerVendas()
    {
        $this->dataInicio = Carbon::createFromFormat('Y-m-d', $this->data_inicio)->startOfDay();
        $this->data_fim = Carbon::createFromFormat('Y-m-d', $this->data_fim)->endOfDay();
        $this->vendas = Venda::where('created_at', '>=', $this->data_inicio)
            ->where('created_at', '<=', $this->data_fim)
            ->get();

        foreach ($this->vendas as $venda) {
            $this->totalGeral += $venda->valor_total;
        }
        $this->valorPer = $this->totalGeral;
        $this->tabelaCarregada = true;
        // dd($this->data_inicio, $this->data_fim);
    }

}
