@extends('layouts.dashboard')
@section('content')

<h2>Clientes</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Nº</th>
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Responsável</th>
        <th>Celular</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clientes as $cliente)
      <tr>
        
          <td>{{$cliente->id}}</td>
          <td><a class="text-dark" href="{{route('clientes.edit',$cliente->id)}}">{{$cliente->razao_social}}</a></td>
          <td>{{$cliente->nome_fantasia}}</td>
          <td>{{$cliente->cnpj}}</td>
          <td>{{$cliente->email}}</td>
          <td>{{$cliente->telefone}}</td>
          <td>{{$cliente->responsavel}}</td>
          <td>{{$cliente->celular}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection