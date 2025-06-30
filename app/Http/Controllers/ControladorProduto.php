<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;


class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexView()
    {   
        return view('produtos');
    }

    public function index()
    {   
        $prods = Produto::all();
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod =  Produto::create([
            'categoria_id'=>$request->input('cat_id'),
            'nome'=>$request->input('nomeProduto'),
            'estoque'=>$request->input('numEstoque'),
            'preco'=>$request->input('precoProduto'),
        ]);
        $prod->save();
        return redirect('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)){
            return view('editarproduto', compact('prod'));
        }
        return redirect('produtos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if (isset($prod)){
            $prod-> nome = $request->input('nomeProduto');
            $prod-> estoque= $request->input('numEstoque');
            $prod-> preco= $request->input('precoProduto');
            $prod->save();
        }
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)){
            $prod->delete();
        }
        return redirect('produtos');
    }
}
