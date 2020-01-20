@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Editar receita
                    <a href="{{route('receitas.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('receitas.update', $receita->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="valorReceita">Valor da receita</label>
                            <input type="number" step=".01" class="form-control" id="valorReceita" name="valorReceita" value="{{ $receita->valorReceita }}">
                        </div>
                        <div class="form-group">
                            <label for="descricaoReceita">Descrição</label>
                            <input type="text" class="form-control" id="descricaoReceita" name="descricaoReceita" value="{{ $receita->descricaoReceita }}" aria-describedby="descricaoReceitalHelp">
                            <small id="descricaoReceitalHelp" class="form-text text-muted">Descrição da receita cadastrada.</small>
                        </div>
                        <div class="form-group">
                            <label for="dataRecebimento">Data recebimento</label>
                            <input type="date" name="dataRecebimento" id="dataRecebimento" value="{{ $receita->dataRecebimento }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="contaReceita">Conta</label>
                            <select class="form-control" id="contaReceita" name="conta_id" aria-describedby="contaReceitaHelp">
                                @foreach ($contas as $conta)
                                    <option value="{{ $conta->id }}" {{$receita->conta_id == $conta->id ? 'selected' : ''}}>{{ $conta->descricaoConta }}</option>
                                @endforeach
                            </select>
                            <small id="contaReceitaHelp" class="form-text text-muted">Conta bancária na qual a receita entrou.</small>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="recebido" name="recebido" {{ $receita->recebido == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="recebido">Recebido</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection