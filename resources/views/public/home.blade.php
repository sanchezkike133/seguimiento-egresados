@extends('layouts.app')

@section('content')
<div class="container" style="text-align:center">

    <!-- BLOQUE CON FONDO -->
    <div class="info-bg">

        <!-- Título principal -->
        <h2 style="font-size:28px; margin-bottom:10px;">
            Sistema de seguimiento de egresados
        </h2>

        <!-- Línea decorativa -->
        <div style="
            width:80px;
            height:4px;
            background-color: var(--verde);
            margin: 15px auto 25px auto;
            border-radius: 2px;">
        </div>

        <!-- Texto + logo -->
        <div style="
            display:flex;
            justify-content:center;
            align-items:center;
            gap:15px;
            margin-bottom:20px;
            flex-wrap:wrap;
        ">
         

            <p style="font-size:16px; line-height:1.6; margin:0;">
                Aplicación web institucional para la gestión y control
                de egresados de la <strong>UES San José del Rincón</strong>.
            </p>
        </div>

        <p style="margin-top:15px; font-size:16px; line-height:1.6;">
            El sistema permite mantener información organizada
            por <strong>carrera</strong>, <strong>generación</strong> y
            <strong>estatus académico</strong>, facilitando el
            seguimiento de los egresados.
        </p>

        <!-- Tarjetas -->
        <div style="
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap:20px;
            margin-top:40px;
            text-align:left;
        ">
            <div style="border:1px solid var(--borde); padding:20px; border-radius:8px;">
                <h4>📚 Carreras</h4>
                <p style="margin-top:8px;">
                    Registro por programas educativos oficiales de la UES.
                </p>
            </div>

            <div style="border:1px solid var(--borde); padding:20px; border-radius:8px;">
                <h4>🎓 Egresados</h4>
                <p style="margin-top:8px;">
                    Control completo de información académica y personal.
                </p>
            </div>

            <div style="border:1px solid var(--borde); padding:20px; border-radius:8px;">
                <h4>🔐 Seguridad</h4>
                <p style="margin-top:8px;">
                    Acceso restringido mediante autenticación administrativa.
                </p>
            </div>
        </div>

    </div>

    <!-- BOTÓN FUERA DEL FONDO -->
    <a href="/admin/login" class="btn" style="
        margin-top:40px;
        display:inline-block;
        font-size:16px;
        padding:12px 30px;
    ">
        Acceso al sistema
    </a>

</div>

<!-- ESTILOS DEL FONDO -->
<style>
    .info-bg {
        padding: 50px 30px;
        border-radius: 14px;
        background:
            linear-gradient(rgba(255,255,255,0.88), rgba(255,255,255,0.88)),
            url("{{ asset('images/imagen2escuela.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection
