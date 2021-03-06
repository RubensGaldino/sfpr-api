@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('mensagem'))
                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    Listagem de despesas
                    <a href="{{route('despesas.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Conta</th>
                            <th scope="col">Pago</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($despesas as $despesa)
                                <tr>
                                    <td>{{ $despesa->descricaoDespesa }}</td>
                                    <td>{{ $despesa->valorDespesa }}</td>
                                    <td>{{ $despesa->conta->descricaoConta }}</td>
                                    <td><span class="badge badge-info">{{ $despesa->pago == true ? 'sim' : 'não'}}</span></td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{route('despesas.edit', $despesa->id)}}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-edit"></i></a>
                                        <form method="POST" action="{{route('despesas.destroy', $despesa->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection