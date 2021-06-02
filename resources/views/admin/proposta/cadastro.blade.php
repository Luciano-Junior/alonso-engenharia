@extends('layouts.dashboard')
@section('content')

<h2>Cadastro de Proposta</h2>
@include('admin.components.message')
<form action="{{route('propostas.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCliente">Cliente</label>
        <select class="form-control" id="inputCliente" name="cliente_id">
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nome_fantasia}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEnderecoObra">Endereço da Obra</label>
        <input type="text" class="form-control" id="inputEnderecoObra" name="endereco_obra" placeholder="Endereço da Obra">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputValor">Valor Total</label>
            <input type="text" class="form-control money" id="inputValor" name="valor_total" placeholder="R$ 0,00" onchange="setTwoNumberDecimal">
        </div>
        <div class="form-group col-md-3">
            <label for="inputSinal">Sinal</label>
            <input type="text" class="form-control money" id="inputSinal" name="sinal" placeholder="R$ 0,00" onchange="setTwoNumberDecimal">
        </div>
        <div class="form-group col-md-2">
            <label for="inputQuantidadeParcelas">Quantidade de Parcelas</label>
            <input type="number" class="form-control" id="inputQuantidadeParcelas" name="quantidade_parcelas">
        </div>
        <div class="form-group col-md-4">
            <label for="inputQuantidadeParcelas">Valor da Parcela</label>
            <input type="text" class="form-control money" id="inputQuantidadeParcelas" name="valor_parcelas" onchange="setTwoNumberDecimal">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputInicioPagamento">Início Pagamento</label>
            <input type="date" class="form-control" id="inputInicioPagamento" name="inicio_pagamento">
        </div>
        <div class="form-group col-md-3">
            <label for="inputDataParcelas">Data das Parcelas</label>
            <input type="date" class="form-control" id="inputDataParcelas" name="data_parcelas">
        </div>
        <div class="form-group col-md-6">
            <label for="inputArquivo">Arquivo</label>
            <input type="file" class="form-control-file" id="inputArquivo" name="arquivo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputStatus">Status</label>
            <select class="form-control" id="inputStatus" name="status">
                <option value="Em aberto">Em aberto</option>
                <option value="Fechado">Fechado</option>
            </select>
          </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>

@endsection
@section('scripts')
<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endsection