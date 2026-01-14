@extends('layouts.admin')

@section('content')
<div class="container">

    <!-- ENCABEZADO -->
    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    ">
        <div>
            <h2 style="font-weight:600; margin-bottom:4px;">
                Panel administrativo
            </h2>
            <p style="font-size:14px; color:#555;">
                Sistema de seguimiento de egresados – UES San José del Rincón
            </p>
        </div>

        <form method="POST" action="/admin/logout">
            @csrf
            <button class="btn" style="padding:8px 18px;">
                Cerrar sesión
            </button>
        </form>
    </div>

    <!-- TARJETA CONTENEDORA -->
    <div style="
        background:var(--blanco);
        border:1px solid var(--borde);
        border-radius:10px;
        padding:25px;
    ">

        <!-- CABECERA TABLA -->
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        ">
            <h3 style="font-weight:600;">
                Egresados registrados
            </h3>

            <a href="{{ route('egresados.create') }}" class="btn">
                + Registrar egresado
            </a>
        </div>

        <!-- MENSAJE DE ÉXITO -->
        @if(session('success'))
            <div style="
                background-color:#E8F5E9;
                color:#2E7D32;
                border:1px solid #C8E6C9;
                padding:12px 15px;
                border-radius:6px;
                margin-bottom:20px;
                font-size:14px;
            ">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLA -->
        @if($egresados->count() > 0)
        <div style="overflow-x:auto;">
            <table style="
                width:100%;
                border-collapse:collapse;
                font-size:14px;
            ">
                <thead>
                    <tr style="background-color:#F5F5F5;">
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Matrícula</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Nombre</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Carrera</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Generación</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Estatus</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Teléfono</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde);">Correo electrónico</th>
                        <th style="padding:12px; border-bottom:1px solid var(--borde); text-align:center;">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($egresados as $egresado)
                    <tr>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->matricula }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->nombre_completo }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->carrera }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->generacion }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->estatus }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->telefono }}
                        </td>
                        <td style="padding:10px; border-bottom:1px solid var(--borde);">
                            {{ $egresado->email }}
                        </td>

                        <td style="
                            padding:10px;
                            border-bottom:1px solid var(--borde);
                            text-align:center;
                        ">
                            <a href="{{ route('egresados.edit', $egresado->id) }}"
                               style="
                                   font-size:13px;
                                   color:#0275d8;
                                   margin-right:12px;
                                   text-decoration:none;
                               ">
                                Editar
                            </a>

                            <form action="{{ route('egresados.destroy', $egresado->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="
                                            background:none;
                                            border:none;
                                            color:#d9534f;
                                            font-size:13px;
                                            cursor:pointer;
                                        "
                                        onclick="return confirm('¿Eliminar egresado?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- PAGINACIÓN -->
        <div style="
            margin-top:20px;
            display:flex;
            justify-content:center;
        ">
            {{ $egresados->links() }}
        </div>

        @else
            <p style="font-size:14px;">
                No hay egresados registrados.
            </p>
        @endif

    </div>
</div>
@endsection
