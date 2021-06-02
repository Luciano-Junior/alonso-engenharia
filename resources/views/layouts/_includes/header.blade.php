<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:: Alonso Engenharia ::.</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    @yield('scripts')
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Alonso Engenharia</a>
      {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clientes.create')}}">
                        <span data-feather="users"></span>
                        Cadastro de Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('clientes.index')}}">
                        <span data-feather="users"></span>
                        Listar/Editar Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('propostas.create')}}">
                    <span data-feather="file"></span>
                    Nova Proposta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('propostas.index')}}">
                    <span data-feather="file"></span>
                    Lista de Propostas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.create')}}">
                    <span data-feather="users"></span>
                    Cadastro de Usuários
                    </a>
                </li>
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="container">