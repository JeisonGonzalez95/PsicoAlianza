@extends('app')

@section('contentM')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img class="img-logo" src="{{ asset('images/psicoalianza.png') }}" alt="Logo PsicoAlianza">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </ul>
            <span class="text-center txt-smll">
                {{ session('name') }} {{ session('lastname') }} <br>
                <p id="hora">: </p>
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success" title="Cerrar Sesión">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="sidebar" id="sidebar">
    <button class="menu-toggle" id="menuToggle">☰</button>
    <a href="{{ route('index') }}" class="menu-item">Inicio</a>
    <div class="menu-item dropdown" id="listasToggle">Listas</div>
    <div class="submenu" id="listasSubmenu">
        <a href="{{ route('employeesList') }}" class="menu-item">Empleados</a>
        <a href="{{ route('positionList') }}" class="menu-item">Cargos</a>
    </div>
</div>
@endsection

@section('contentR')
<div class="content-wrapper">
    <div class="card bg-glass shadow-sm">
        <div class="card-body px-4 py-5 px-md-5 text-center">
            <div class="mb-4">
                <h1 class="fw-bold mb-0">Bienvenido!<br> {{ session('name') }} {{ session('lastname') }}!</h1>
            </div>
            <p class="fw-semibold mb-4 text-muted">Añade los datos personales de tus empleados y después agrega su cargo en tu empresa.</p>
            
            <a class="btn btn-lg" href="{{ route('registerEc') }}">
                <img class="img-logo" src="{{ asset('images/user.png') }}" alt=""><br>Registrar Usuario
            </a>
        </div>
    </div>
</div>

@endsection