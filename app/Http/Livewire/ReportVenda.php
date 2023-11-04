<?php

namespace App\Http\Livewire;

use App\Models\Venda;
use Carbon\Carbon;
use Livewire\Component;

class ReportVenda extends Component
{
    public $vendas;
    public $data_fim;
    public $data_inicio;
    public $tabelaCarregada = false;
    public $valorTrinta;
    public $valorQuinze;
    public $valorCinco;
    public $valorPer;
    public $totalGeral;
    public $totalGeralQuinze;
    public $totalGeralCinco;
    public $chartData;
    public $labels;
    public $vendasPorDia;
    public function render()
    {
        $this->valor = $this->totalGeral;
        return view('livewire.report-venda');

    }

    public function vendaTrintaDias()
    {
        $this->vendas = Venda::whereDate('created_at', '>=', Carbon::now()->subDays(30))->get();

        $this->vendasPorDia = [];
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i)->format('d/m');
            $this->vendasPorDia[$date] = 0;
        }

        foreach ($this->vendas as $venda) {
            $dataVenda = $venda->created_at->format('d/m');
            if (array_key_exists($dataVenda, $this->vendasPorDia)) {
                $this->vendasPorDia[$dataVenda] += $venda->valor_total;
            }
        }
        $this->totalGeral = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeral += $venda->valor_total;
        }

        $this->labels = [];
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i);
            $this->labels[] = $date->format('d/m');
        }
        $this->labels = array_reverse($this->labels);

        $this->valorTrinta = $this->totalGeral;
        $this->tabelaCarregada = true;

        $this->dispatch('labels-updated', $this->labels, $this->vendasPorDia);
    }

    public function vendaQuinzeDias()
    {
        $this->vendas = Venda::whereDate('created_at', '>=', Carbon::now()->subDays(15))->get();

        $this->vendasPorDia = [];
        for ($i = 0; $i < 15; $i++) {
            $date = Carbon::now()->subDays($i)->format('d/m');
            $this->vendasPorDia[$date] = 0;
        }

        foreach ($this->vendas as $venda) {
            $dataVenda = $venda->created_at->format('d/m');
            if (array_key_exists($dataVenda, $this->vendasPorDia)) {
                $this->vendasPorDia[$dataVenda] += $venda->valor_total;
            }
        }
        $this->totalGeral = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeral += $venda->valor_total;
        }

        $this->labels = [];
        $this->totalGeralQuinze = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeralQuinze += $venda->valor_total;
        }

        for ($i = 0; $i < 15; $i++) {
            $date = Carbon::now()->subDays($i);
            $this->labels[] = $date->format('d/m');
        }

        $this->labels = array_reverse($this->labels);
        $this->valorQuinze = $this->totalGeralQuinze;
        $this->tabelaCarregada = true;

        $this->dispatch('labels-updated', $this->labels, $this->vendasPorDia);
    }
    public function vendaCincoDias()
    {
        $this->vendas = Venda::whereDate('created_at', '>=', Carbon::now()->subDays(5))->get();

        $this->vendasPorDia = [];
        for ($i = 0; $i < 5; $i++) {
            $date = Carbon::now()->subDays($i)->format('d/m');
            $this->vendasPorDia[$date] = 0;
        }

        foreach ($this->vendas as $venda) {
            $dataVenda = $venda->created_at->format('d/m');
            if (array_key_exists($dataVenda, $this->vendasPorDia)) {
                $this->vendasPorDia[$dataVenda] += $venda->valor_total;
            }
        }

        $this->totalGeral = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeral += $venda->valor_total;
        }
        $this->totalGeralCinco = 0;
        foreach ($this->vendas as $venda) {
            $this->totalGeralCinco += $venda->valor_total;
        }

        $this->labels = [];
        for ($i = 0; $i < 5; $i++) {
            $date = Carbon::now()->subDays($i);
            $this->labels[] = $date->format('d/m');
        }

        $this->labels = array_reverse($this->labels);
        $this->valorCinco = $this->totalGeralCinco;
        $this->tabelaCarregada = true;

        $this->dispatch('labels-updated', $this->labels, $this->vendasPorDia);
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
