<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Black Store - Admin</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #111;
            color: white;
            padding: 15px;
        }

        nav {
            background-color: #222;
            padding: 10px;
        }

        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .btn {
            padding: 8px 12px;
            background-color: #111;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #444;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #111;
            color: white;
        }
    </style>
</head>

<body>

<header style="display:flex; justify-content:space-between; align-items:center;">
    <h2>Black Store - Panel Admin</h2>

    <div>
        <span>Hola, {{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button class="btn">Cerrar sesión</button>
        </form>
    </div>
</header>

<nav>
    <a href="/admin/dashboard">Dashboard</a>
    <a href="/admin/categories">Categorías</a>
    <a href="/admin/products">Productos</a>
    <a href="/admin/variants">Inventario</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>