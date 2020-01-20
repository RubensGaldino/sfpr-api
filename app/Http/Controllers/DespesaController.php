<?php

namespace App\Http\Controllers;

use App\{Despesa, Conta};
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesas = Despesa::all();
        return view('despesas.index', compact('despesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contas = Conta::all();
        return view('despesas.create', compact('contas'));
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
        $data['pago'] = isset($request->pago) ? true : false;

        $despesa = Despesa::create($data);

        return redirect('despesas')->with('mensagem', 'Despesa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa $despesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        $contas = Conta::all();

        return view('despesas.edit', compact('despesa', 'contas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa $despesa)
    {
        $data = $request->except(['_token']);
        $data['pago'] = isset($request->pago) ? true : false;

        $despesa->update($data);

        return redirect('despesas')->with('mensagem', 'Despesa alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        $despesa->delete();
        return redirect('despesas')->with('mensagem', 'Despesa deletada com sucesso!');   
    }
}
