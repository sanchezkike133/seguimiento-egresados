<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'UES - Egresados')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    :root {
        --verde-principal: #7CB342;
        --verde-hover: #689F38;
        --naranja-principal: #C1704F;
        --blanco: #FFFFFF;
        --negro: #1A1A1A;
        --gris-claro: #F8F9FA;
        --gradiente: linear-gradient(135deg, #7CB342 0%, #C1704F 100%);
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background: var(--gris-claro);
        color: var(--negro);
    }

    header {
        background: var(--gradiente);
        padding: 26px 40px; /* 🔹 MÁS ALTO EL HEADER */
        color: var(--blanco);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* CONTENEDOR LOGO + TEXTO */
    .brand {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .brand img {
        height: 90px; /* ✅ LOGO MUCHO MÁS GRANDE */
        width: auto;
    }

    .brand h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
        line-height: 1.2;
        text-transform: capitalize;
    }

    nav a {
        color: var(--blanco);
        text-decoration: none;
        margin-left: 24px;
        font-weight: 600;
        font-size: 15px;
    }

    nav a:hover {
        text-decoration: underline;
    }

    main {
        max-width: 1100px;
        margin: 40px auto;
        background: var(--blanco);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    footer {
        background: var(--negro);
        color: var(--blanco);
        text-align: center;
        padding: 15px;
        margin-top: 40px;
        font-size: 14px;
    }

    .btn {
        display: inline-block;
        padding: 12px 22px;
        background: var(--verde-principal);
        color: var(--blanco);
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn:hover {
        background: var(--verde-hover);
    }
    </style>
</head>

<body>

<header>
    <!-- LOGO + NOMBRE -->
    <div class="brand">
        <img src="{{ asset('images/logo.png') }}" alt="Logo UES San José del Rincón">
        <h2>Ues San José del Rincón</h2>
    </div>

    <!-- MENÚ -->
    <nav>
        <a href="/">Inicio</a>
        <a href="/admin/login">Administrador</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    © {{ date('Y') }} Ues San José del Rincón
</footer>

</body>
</html>
