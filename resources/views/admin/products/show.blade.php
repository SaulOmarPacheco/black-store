<h1>Detalle del producto</h1>

<p><strong>ID:</strong> {{ $product->id }}</p>
<p><strong>Nombre:</strong> {{ $product->name }}</p>
<p><strong>Categoría:</strong> {{ $product->category->name }}</p>
<p><strong>Descripción:</strong> {{ $product->description }}</p>
<p><strong>Marca:</strong> {{ $product->brand }}</p>
<p><strong>Activo:</strong> {{ $product->active ? 'Sí' : 'No' }}</p>

@if($product->image_path)
    <p><strong>Imagen:</strong></p>
    <img src="{{ $product->image_path }}" alt="{{ $product->name }}" width="150">
@endif

<h2>Variantes</h2>

@if($product->variants->isEmpty())
    <p>Este producto aún no tiene variantes registradas.</p>
@else
    <table border="1" cellpadding="10">
        <thead>
            <tr>    
                <th>SKU</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->variants as $variant)
                <tr>
                    <td>{{ $variant->sku }}</td>
                    <td>{{ $variant->size }}</td>
                    <td>{{ $variant->color }}</td>
                    <td>{{ $variant->price }}</td>
                    <td>{{ $variant->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('products.index') }}">Volver</a>