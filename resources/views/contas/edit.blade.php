@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Editar conta
                    <a href="{{route('contas.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('contas.update', $conta->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="saldoConta">Saldo atual da conta</label>
                        <input type="number" step=".01" class="form-control" id="saldoConta" name="saldoConta" value="{{$conta->saldoConta}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="descricaoConta">Descrição</label>
                        <input type="text" class="form-control" id="descricaoConta" name="descricaoConta" value="{{$conta->descricaoConta}}" aria-describedby="descricaoContalHelp">
                            <small id="descricaoContalHelp" class="form-text text-muted">Nome para a conta cadastrada.</small>
                        </div>
                        <div class="form-group">
                            <label for="tipoConta">Tipo da conta</label>
                            <select class="form-control" id="tipoConta" name="tipoConta">
                                <option value="Conta corrente" {{$conta->tipoConta == 'Conta corrente' ? 'selected' : ''}}>Conta corrente</option>
                                <option value="Dinheiro" {{$conta->tipoConta == 'Dinheiro' ? 'selected' : ''}}>Dinheiro</option>
                                <option value="Poupança" {{$conta->tipoConta == 'Poupança' ? 'selected' : ''}}>Poupança</option>
                                <option value="Investimentos" {{$conta->tipoConta == 'Investimentos' ? 'selected' : ''}}>Investimentos</option>
                                <option value="Outros" {{$conta->tipoConta == 'Outros' ? 'selected' : ''}}>Outros</option>
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="incluirSaldoNaTela" name="incluirSaldoNaTela" {{$conta->incluirSaldoNaTela == true ? 'checked' : ''}}>
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