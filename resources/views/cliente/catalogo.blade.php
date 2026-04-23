@extends('layouts.client')

@section('content')

<div class="title">
    <h1>Catálogo de productos</h1>
    <p class="subtitle">Explora los productos disponibles en Black Store.</p>
</div>

<div class="grid">
    @forelse($products as $product)
        <div class="card">
            @if($product->image_path)
                <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
            @else
                <img src="https://via.placeholder.com/500x300?text=Black+Store" alt="Sin imagen">
            @endif

            <div class="card-body">
                <h3>{{ $product->name }}</h3>
                <p class="muted"><strong>Categoría:</strong> {{ $product->category->name }}</p>
                <p class="muted"><strong>Marca:</strong> {{ $product->brand }}</p>
                <p>{{ $product->description }}</p>

                <h4>Variantes disponibles</h4>

                @foreach($product->variants as $variant)
                    <div class="variant-box">
                        <div><strong>SKU:</strong> {{ $variant->sku }}</div>
                        <div><strong>Talla:</strong> {{ $variant->size }}</div>
                        <div><strong>Color:</strong> {{ $variant->color }}</div>
                        <div><strong>Precio:</strong> ${{ number_format($variant->price, 2) }}</div>
                    </div>
                @endforeach

                <a href="{{ route('cliente.carrito') }}" class="btn">Agregar al carrito</a>
            </div>
        </div>
    @empty
        <p>No hay productos disponibles.</p>
    @endforelse
</div>

@endsection