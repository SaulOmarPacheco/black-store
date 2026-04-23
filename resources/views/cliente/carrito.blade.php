@extends('layouts.client')

@section('content')

<div class="title">
    <h1>Carrito de compras</h1>
    <p class="subtitle">Resumen de los artículos seleccionados.</p>
</div>

<div class="table-box">
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Playera Nike</td>
                <td>M</td>
                <td>Negro</td>
                <td>1</td>
                <td>$299.00</td>
                <td>$299.00</td>
            </tr>
            <tr>
                <td>Sudadera Oversize</td>
                <td>G</td>
                <td>Gris</td>
                <td>1</td>
                <td>$450.00</td>
                <td>$450.00</td>
            </tr>
        </tbody>
    </table>

    <div class="total-box">
        Total: $749.00
    </div>

    <a href="{{ route('cliente.ticket') }}" class="btn">Finalizar compra</a>
</div>

@endsection