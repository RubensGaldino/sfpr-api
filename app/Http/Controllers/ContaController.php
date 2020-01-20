<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Conta::all();
        return view('contas.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contas.create');
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
        $data['incluirSaldoNaTela'] = isset($request->incluirSaldoNaTela) ? true : false;

        $conta = Conta::create($data);

        return redirect('contas')->with('mensagem', 'Conta criada com sucesso!');
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
        $conta = Conta::find($id);

        return view('contas.edit', compact('conta'));
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
        $data = $request->all();
        $data['incluirSaldoNaTela'] = isset($request->incluirSaldoNaTela) ? true : false;

        $conta = Conta::find($id)->update($data);

        return redirect('contas')->with('mensagem', 'Conta alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conta = Conta::find($id)->delete();

        return redirect('contas')->with('mensagem', 'Conta deletada com sucesso!');
    }
}
