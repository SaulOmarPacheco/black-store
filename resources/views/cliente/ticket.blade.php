@extends('layouts.client')

@section('content')

<div class="title center">
    <h1>Ticket de compra</h1>
    <p class="subtitle">Comprobante simulado de compra realizada.</p>
</div>

<div class="ticket">
    <h2>BLACK STORE</h2>
    <p>Ticket de compra</p>

    <div class="line"></div>

    <p>Folio: BS-001</p>
    <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
    <p>Cliente: {{ auth()->user()->name }}</p>

    <div class="line"></div>
    
    <p>Playera Nike - $299.00</p>
    <p>Sudadera Oversize - $450.00</p>

    <div class="line"></div>

    <p><strong>Total: $749.00</strong></p>

    <div class="line"></div>

    <p>Gracias por su compra</p>
</div>

@endsection