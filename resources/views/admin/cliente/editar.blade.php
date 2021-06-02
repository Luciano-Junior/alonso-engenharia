@extends('layouts.dashboard')
@section('content')

<h2>Cadastro de Cliente</h2>
@include('admin.components.message')
<form action="{{route('clientes.update',$cliente->id)}}" method="POST">
    @method('put')
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputRazao">Razão Social</label>
        <input type="text" class="form-control" id="inputRazao" name="razao_social" placeholder="Razão Social" value="{{$cliente->razao_social}}">
      </div>
      <div class="form-group col-md-6">
        <label for="inputNome">Nome Fantasia</label>
        <input type="text" class="form-control" id="inputNome" name="nome_fantasia" placeholder="Nome Fantasia" value="{{$cliente->nome_fantasia}}">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCNPJ">CNPJ</label>
      <input type="text" class="form-control cnpj" id="inputCNPJ" name="cnpj" placeholder="00.000.000/0000-00" value="{{$cliente->cnpj}}">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Endereço</label>
      <input type="text" class="form-control" id="inputAddress2" name="endereco" placeholder="Apartamento, hotel, casa, etc." value="{{$cliente->endereco}}">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@dominio.com" value="{{$cliente->email}}">
      </div>
      <div class="form-group col-md-4">
        <label for="inputTelefone">Telefone</label>
        <input type="text" class="form-control phone" id="inputTelefone" name="telefone" value="{{$cliente->telefone}}">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputResponsavel">Responsável</label>
            <input type="text" class="form-control" id="inputResponsavel" name="responsavel" placeholder="Nome do Responsável" value="{{$cliente->responsavel}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCPF">CPF</label>
            <input type="text" class="form-control cpf" id="inputCPF" name="cpf" placeholder="CPF" value="{{$cliente->cpf}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputCelular">Celular</label>
        <input type="text" class="form-control phone" id="inputCelular" name="celular" placeholder="(00) 00000-0000" value="{{$cliente->celular}}">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>

@endsection