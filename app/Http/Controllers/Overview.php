<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class Overview extends Controller
{  
    public $produtos;

    public function render(){

        $produtos = count(Produto::all());
        $foraEstoque = Produto::where('quantidade', 0)->count();
        return view('pages', compact(
            'produtos',
            'foraEstoque',
        ));
    }
}
