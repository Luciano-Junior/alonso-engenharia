@extends('layouts.dashboard')
@section('content')

<h2>Cadastro de Usuário</h2>
@include('admin.components.message')
<form action="{{route('users.store')}}" method="POST">
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNome">Nome</label>
        <input type="text" class="form-control" id="inputNome" name="name" placeholder="Nome">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@dominio.com">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputPassword">Senha</label>
        <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="form-group col-md-6">
            <label for="inputConfirmPassword">Confirmar Senha</label>
            <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>

@endsection