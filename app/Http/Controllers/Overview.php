<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class Overview extends Controller
{  
    public $produtos;

    public function render(){

        $produtos_quantidade = count(Produto::all());

        $produtos = Produto::all();
        $foraEstoque = 0;
        foreach ($produtos as $produto) {
            if($produto->quantidade == 0 || $produto->quantidade < 0){
                $foraEstoque = $foraEstoque+1; 
            }
        }
        return view('pages', compact(
            'produtos_quantidade',
            'foraEstoque',
        ));
    }
}
