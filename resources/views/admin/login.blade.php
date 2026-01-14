@extends('layouts.admin')

@section('content')
<div class="container" style="
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:70vh;
">

    <!-- TARJETA LOGIN -->
    <div style="
        width:100%;
        max-width:420px;
        background:var(--blanco);
        border:1px solid var(--borde);
        border-radius:12px;
        padding:30px 35px;
        box-shadow:0 10px 25px rgba(0,0,0,.08);
    ">

        <!-- LOGO -->
        <div style="text-align:center; margin-bottom:20px;">
            <img src="{{ asset('images/imagen1.png') }}"
                 alt="UES San José del Rincón"
                 style="max-width:110px;">
        </div>

        <!-- TÍTULO -->
        <div style="text-align:center; margin-bottom:25px;">
            <h2 style="margin-bottom:5px; font-weight:600;">
                Acceso administrativo
            </h2>
            <p style="font-size:14px; color:#666;">
                Sistema de seguimiento de egresados
            </p>
        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div style="
                background:#FDECEA;
                color:#B71C1C;
                border:1px solid #F5C6CB;
                padding:10px 12px;
                border-radius:6px;
                margin-bottom:15px;
                font-size:14px;
            ">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORMULARIO -->
        <form method="POST" action="/admin/login">
            @csrf

            <div style="margin-bottom:15px;">
                <label style="font-size:14px; font-weight:500;">
                    Correo electrónico
                </label>
                <input
                    type="email"
                    name="email"
                    required
                    placeholder="correo@institucion.edu.mx"
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:5px;
                        border-radius:6px;
                        border:1px solid var(--borde);
                    "
                >
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-size:14px; font-weight:500;">
                    Contraseña
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:5px;
                        border-radius:6px;
                        border:1px solid var(--borde);
                    "
                >
            </div>

            <!-- BOTONES -->
            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn" style="flex:1;">
                    Ingresar
                </button>

                <a href="{{ url('/') }}"
                   class="btn"
                   style="
                       flex:1;
                       background:#6c757d;
                       text-align:center;
                   ">
                    Cancelar
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
