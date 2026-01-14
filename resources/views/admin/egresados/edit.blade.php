@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:1000px;">

    <!-- ENCABEZADO -->
    <div style="margin-bottom:25px;">
        <h2 style="font-weight:600; margin-bottom:5px;">
            Editar egresado
        </h2>
        <p style="font-size:14px; color:#555;">
            Actualiza la información del egresado seleccionado
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
            <strong>Corrige los siguientes errores:</strong>
            <ul style="margin-top:8px; padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- TARJETA -->
    <form action="{{ route('egresados.update', $egresado->id) }}"
          method="POST"
          style="
            background:var(--blanco);
            padding:30px;
            border-radius:12px;
            border:1px solid var(--borde);
            box-shadow:0 8px 20px rgba(0,0,0,.05);
          ">
        @csrf
        @method('PUT')

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
                       value="{{ $egresado->matricula }}"
                       required>
            </div>

            <!-- Nombre -->
            <div>
                <label>Nombre completo</label>
                <input type="text" name="nombre_completo"
                       value="{{ $egresado->nombre_completo }}"
                       required>
            </div>

            <!-- Carrera -->
            <div>
                <label>Carrera</label>
                <select name="carrera" required>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera }}"
                            {{ $egresado->carrera == $carrera ? 'selected' : '' }}>
                            {{ $carrera }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Generación -->
            <div>
                <label>Generación</label>
                <select name="generacion" required>
                    @foreach($generaciones as $gen)
                        <option value="{{ $gen }}"
                            {{ $egresado->generacion == $gen ? 'selected' : '' }}>
                            {{ $gen }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Estatus -->
            <div>
                <label>Estatus</label>
                <select name="estatus" required>
                    <option value="Egresado" {{ $egresado->estatus == 'Egresado' ? 'selected' : '' }}>Egresado</option>
                    <option value="En seguimiento" {{ $egresado->estatus == 'En seguimiento' ? 'selected' : '' }}>En seguimiento</option>
                    <option value="Titulado" {{ $egresado->estatus == 'Titulado' ? 'selected' : '' }}>Titulado</option>
                </select>
            </div>

            <!-- Género -->
            <div>
                <label>Género</label>
                <select name="genero" required>
                    <option value="Masculino" {{ $egresado->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ $egresado->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="Otro" {{ $egresado->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <!-- Domicilio -->
            <div>
                <label>Domicilio</label>
                <input type="text" name="domicilio"
                       value="{{ $egresado->domicilio }}"
                       required>
            </div>

            <!-- Teléfono -->
            <div>
                <label>Teléfono</label>
                <input type="text" name="telefono"
                       value="{{ $egresado->telefono }}"
                       required>
            </div>

            <!-- Correo -->
            <div>
                <label>Correo electrónico</label>
                <input type="email" name="email"
                       value="{{ $egresado->email }}"
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
                Guardar cambios
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
