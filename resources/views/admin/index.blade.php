@extends('layouts.dashboard')
@section('content')

<div class="row">
  <div class="col-md-3">
    <h2>Propostas</h2>
  </div>
  <div class="col-md-9 d-flex justify-content-end">
    <form class="form-inline" action="{{route('pesquisa')}}" method="post">
      @csrf
      <div class="form-group mb-2">
        <select name="tipo" class="form-control" id="tipo">
          <option value="Cliente">Cliente</option>
          <option value="Status">Status</option>
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="Seach" class="sr-only">Pesquisar</label>
        <input type="text" class="form-control" name="pesquisa" id="inputSearch">
      </div>
      <button type="submit" class="btn btn-primary btn-sm mb-2">Buscar</button>
    </form>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Nº</th>
        <th>Cliente</th>
        <th>Proposta feita em</th>
        <th>Início do pgto.</th>
        <th>Qtde. de Parcelas</th>
        <th>Sinal R$</th>
        <th>Valor Parcela R$</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @isset($propostas)
        @foreach ($propostas as $proposta)
        <tr>
          <td>{{$proposta->id}}</td>
          <td><a href="{{route('propostas.edit',$proposta->id)}}">{{$proposta->cliente->nome_fantasia}}</a></td>
          <td>{{Carbon\Carbon::parse($proposta->created_at)->format('d/m/Y')}}</td>
          <td>{{Carbon\Carbon::parse($proposta->inicio_pagamento)->format('d/m/Y')}}</td>
          <td>{{$proposta->quantidade_parcelas}}</td>
          <td>R$ {{ number_format($proposta->sinal, 2, ",", ".") }}</td>
          <td>R$ {{ number_format($proposta->valor_parcelas, 2, ",", ".") }}</td>
          <td>R$ {{ number_format($proposta->valor_total, 2, ",", ".") }}</td>
          <td>
            <select name="status" id="status" class="status" onchange="updateStatus(event.target.value, {{$proposta->id}})">
              <option value="Em aberto" {{$proposta->status == "Em aberto"?"selected":''}}>Em aberto</option>
              <option value="Fechado" {{$proposta->status == "Fechado"?"selected":''}}>Fechado</option>
            </select>
          </td>
        </tr>
        @endforeach
      @endisset
    </tbody>
  </table>
</div>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    {{-- <button class="btn btn-sm btn-outline-secondary">Share</button> --}}
    <a href="{{route('export')}}"class="btn btn-sm btn-outline-success">Exportar</a>
  </div>
  {{-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    This week
  </button> --}}
</div>

@endsection

@section('scripts')
  <script>
    function updateStatus(element, id){
      
        $.ajax({
          url: 'proposta/atualiza/status',
          type: "post",
          data: {
            'status':element,
            'id':id,
            _token: "{{ csrf_token() }}"
          },
          success: function(data){
            alert('Status atualizado com sucesso!');
          },
          error: function(fail){
            alert(fail.responseText);
          }
        })
    }
  </script>
@endSection