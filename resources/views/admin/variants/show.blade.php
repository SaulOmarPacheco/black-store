<h1>Detalle de variante</h1>

<p><strong>Producto:</strong> {{ $variant->product->name }}</p>
<p><strong>SKU:</strong> {{ $variant->sku }}</p>
<p><strong>Talla:</strong> {{ $variant->size }}</p>
<p><strong>Color:</strong> {{ $variant->color }}</p>
<p><strong>Precio:</strong> {{ $variant->price }}</p>
<p><strong>Stock:</strong> {{ $variant->stock }}</p>

<a href="{{ route('variants.index') }}">Volver</a>