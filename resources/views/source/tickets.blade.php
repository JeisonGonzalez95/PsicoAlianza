@extends('source.index')

@section('contentR')

<div class="card bg-glass">
    <div class="card-body px-4 py-5 px-md-5">
        <!-- Header section -->
        <div class="d-flex align-items-center mb-5 pb-1">
            <span class="h1 fw-bold mb-0">Tickets</span>
        </div>

        <form id="register" autocomplete="off" action="{{ route('register_u') }}" method="POST">
            @csrf
            <!-- First row with input fields -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre completo" required>
                    <label class="form-label" for="form3Example1">Nombre</label>
                </div>
                <div class="col-md-6">
                    <select type="text" id="lastaname" name="lastname" class="form-select" placeholder="Apellidos" required>
                        <option value="0">Seleccione Uno...</option>
                    </select>
                    <label class="form-label" for="form3Example2">Apellidos</label>
                </div>
                <div class="col-md-12">
                    <input type="text" id="dni" name="dni" class="form-control" placeholder="Numero de documento / DNI" required>
                    <label class="form-label" for="form3Example3">Documento</label>
                </div>
            </div>

            <!-- Submit button row -->
            <div class="row justify-content-center mb-5">
                <div class="col-3">
                    <button class="btn btn-success w-100" type="submit"> Registrarse</button>
                </div>
                <div class="col-3">
                    <a href="app" class="btn btn-danger w-100">Volver</a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection