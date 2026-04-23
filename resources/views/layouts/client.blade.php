<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Black Store</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #222;
        }

        header {
            background-color: #111;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        .logout-btn {
            background: white;
            color: #111;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #ddd;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .title {
            margin-bottom: 25px;
        }

        .title h1 {
            margin: 0;
            font-size: 30px;
        }

        .subtitle {
            color: #666;
            margin-top: 8px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .card-body {
            padding: 18px;
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .muted {
            color: #666;
            font-size: 14px;
        }

        .variant-box {
            background: #f8f8f8;
            border-radius: 8px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin-top: 12px;
        }

        .btn:hover {
            background: #333;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #111;
            color: white;
        }

        .total-box {
            margin-top: 20px;
            text-align: right;
            font-size: 20px;
            font-weight: bold;
        }

        .ticket {
            background: white;
            width: 380px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            font-family: monospace;
        }

        .ticket h2, .ticket p {
            text-align: center;
        }

        .line {
            border-top: 1px dashed #999;
            margin: 15px 0;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h2>Black Store</h2>

    <div class="user-box">
        <nav>
            <a href="{{ route('cliente.catalogo') }}">Catálogo</a>
            <a href="{{ route('cliente.carrito') }}">Carrito</a>
            <a href="{{ route('cliente.ticket') }}">Ticket</a>
        </nav>

        <span>{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Cerrar sesión</button>
        </form>
    </div>
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>