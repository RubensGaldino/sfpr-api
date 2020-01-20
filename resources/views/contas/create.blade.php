@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Cadastrar conta
                    <a href="{{route('contas.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('contas.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="saldoConta">Saldo atual da conta</label>
                            <input type="number" step=".01" class="form-control" id="saldoConta" name="saldoConta">
                            
                        </div>
                        <div class="form-group">
                            <label for="descricaoConta">Descrição</label>
                            <input type="text" class="form-control" id="descricaoConta" name="descricaoConta" aria-describedby="descricaoContalHelp">
                            <small id="descricaoContalHelp" class="form-text text-muted">Nome para a conta cadastrada.</small>
                        </div>
                        <div class="form-group">
                            <label for="tipoConta">Tipo da conta</label>
                            <select class="form-control" id="tipoConta" name="tipoConta">
                                <option value="Conta corrente">Conta corrente</option>
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Poupança">Poupança</option>
                                <option value="Investimentos">Investimentos</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="incluirSaldoNaTela" name="incluirSaldoNaTela">
                            <label class="form-check-label" for="incluirSaldoNaTela">incluir na soma da tela inicial</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection