@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Editar despesa
                    <a href="{{route('despesas.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('despesas.update', $despesa->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="valorDespesa">Valor da despesa</label>
                            <input type="number" step=".01" class="form-control" id="valorDespesa" name="valorDespesa" value="{{ $despesa->valorDespesa }}">
                        </div>
                        <div class="form-group">
                            <label for="descricaoDespesa">Descrição</label>
                            <input type="text" class="form-control" id="descricaoDespesa" name="descricaoDespesa" value="{{ $despesa->descricaoDespesa }}" aria-describedby="descricaoDespesaHelp">
                            <small id="descricaoDespesaHelp" class="form-text text-muted">Descrição da despesa cadastrada.</small>
                        </div>
                        <div class="form-group">
                            <label for="dataPagamento">Data recebimento</label>
                            <input type="date" name="dataPagamento" id="dataPagamento" value="{{ $despesa->dataPagamento }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contaDespesa">Conta</label>
                            <select class="form-control" id="contaDespesa" name="conta_id" aria-describedby="contaDespesaHelp">
                                @foreach ($contas as $conta)
                                    <option value="{{ $conta->id }}" {{$despesa->conta_id == $conta->id ? 'selected' : ''}}>{{ $conta->descricaoConta }}</option>
                                @endforeach
                            </select>
                            <small id="contaDespesaHelp" class="form-text text-muted">Conta bancária na qual a despesa entrou.</small>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="pago" name="pago" {{ $despesa->pago == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="pago">Pago</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection