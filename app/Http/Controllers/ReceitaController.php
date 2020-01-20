<?php

namespace App\Http\Controllers;

use App\{Receita, Conta};
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receita::all();

        return view('receitas.index', compact('receitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contas = Conta::all();

        return view('receitas.create', compact('contas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['recebido'] = isset($request->recebido) ? true : false;

        $receita = Receita::create($data);

        return redirect('receitas')->with('mensagem', 'Receita criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        $contas = Conta::all();

        return view('receitas.edit', compact('receita', 'contas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        $data = $request->except(['_token']);
        $data['recebido'] = isset($request->recebido) ? true : false;

        $receita->update($data);

        return redirect('receitas')->with('mensagem', 'Receita alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        $receita->delete();
        return redirect('receitas')->with('mensagem', 'Receita deletada com sucesso!');   
    }
}
