@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 1000px;">

    <!-- ENCABEZADO -->
    <div style="margin-bottom: 25px;">
        <h2 style="font-weight:600; margin-bottom:5px;">
            Registrar nuevo egresado
        </h2>
        <p style="font-size:14px; color:#555;">
            Sistema de seguimiento de egresados
        </p>
    </div>

    <!-- BOTÓN REGRESAR -->
    <a href="{{ route('dashboard') }}" class="btn" style="margin-bottom:20px; display:inline-block;">
        ← Regresar
    </a>

    <!-- ERRORES -->
    @if ($errors->any())
        <div style="
            background:#FDECEA;
            color:#B71C1C;
            border:1px solid #F5C6CB;
            padding:15px;
            border-radius:8px;
            margin-bottom:20px;
            font-size:14px;
        ">
            <strong>Verifica los siguientes campos:</strong>
            <ul style="margin-top:8px; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- TARJETA FORMULARIO -->
    <form action="{{ route('egresados.store') }}" method="POST"
          style="
            background:var(--blanco);
            padding:30px;
            border-radius:12px;
            border:1px solid var(--borde);
            box-shadow:0 8px 20px rgba(0,0,0,.05);
          ">
        @csrf

        <!-- GRID -->
        <div style="
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap:20px;
        ">

            <!-- Matrícula -->
            <div>
                <label>Matrícula</label>
                <input type="text" name="matricula"
                       value="{{ old('matricula') }}"
                       placeholder="Ej: 12345678"
                       maxlength="8"
                       pattern="\d{8}"
                       required>
            </div>

            <!-- Nombre -->
            <div>
                <label>Nombre completo</label>
                <input type="text" name="nombre_completo"
                       value="{{ old('nombre_completo') }}"
                       placeholder="Ej: Juan Pérez"
                       required>
            </div>

            <!-- Carrera -->
            <div>
                <label>Carrera</label>
                <select name="carrera" required>
                    <option value="">Selecciona una carrera</option>
                    <option value="Ingeniería en Innovación Agrícola Sustentable"
                        {{ old('carrera') == 'Ingeniería en Innovación Agrícola Sustentable' ? 'selected' : '' }}>
                        Ingeniería en Innovación Agrícola Sustentable
                    </option>
                    <option value="Ingeniería en Sistemas Computacionales"
                        {{ old('carrera') == 'Ingeniería en Sistemas Computacionales' ? 'selected' : '' }}>
                        Ingeniería en Sistemas Computacionales
                    </option>
                    <option value="Licenciatura en Contaduría"
                        {{ old('carrera') == 'Licenciatura en Contaduría' ? 'selected' : '' }}>
                        Licenciatura en Contaduría
                    </option>
                </select>
            </div>

            <!-- Generación -->
            <div>
                <label>Generación</label>
                <input type="text" name="generacion"
                       value="{{ old('generacion') }}"
                       placeholder="Ej: 2014-2019"
                       required>
            </div>

            <!-- Estatus -->
            <div>
                <label>Estatus</label>
                <select name="estatus" required>
                    <option value="">Selecciona estatus</option>
                    <option value="Egresado" {{ old('estatus') == 'Egresado' ? 'selected' : '' }}>Egresado</option>
                    <option value="En seguimiento" {{ old('estatus') == 'En seguimiento' ? 'selected' : '' }}>En seguimiento</option>
                    <option value="Titulado" {{ old('estatus') == 'Titulado' ? 'selected' : '' }}>Titulado</option>
                </select>
            </div>

            <!-- Género -->
            <div>
                <label>Género</label>
                <select name="genero" required>
                    <option value="">Selecciona género</option>
                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value “Otro” {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <!-- Domicilio -->
            <div>
                <label>Domicilio</label>
                <input type="text" name="domicilio"
                       value="{{ old('domicilio') }}"
                       placeholder="Ej: Calle 123"
                       required>
            </div>

            <!-- Teléfono -->
            <div>
                <label>Teléfono</label>
                <input type="text" name="telefono"
                       value="{{ old('telefono') }}"
                       placeholder="Ej: 5551234567"
                       maxlength="10"
                       pattern="\d{10}"
                       required>
            </div>

            <!-- Correo -->
            <div>
                <label>Correo electrónico</label>
                <input type="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="correo@dominio.com"
                       required>
            </div>

        </div>

        <!-- BOTONES -->
        <div style="
            margin-top:30px;
            display:flex;
            gap:15px;
        ">
            <button type="submit" class="btn">
                Registrar egresado
            </button>

            <a href="{{ route('dashboard') }}"
               class="btn"
               style="background:#6c757d;">
                Cancelar
            </a>
        </div>

    </form>
</div>
@endsection
