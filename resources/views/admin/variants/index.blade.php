<h1>Variantes de producto</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('variants.create') }}">Nueva variante</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>SKU</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($variants as $variant)
            <tr>
                <td>{{ $variant->id }}</td>
                <td>{{ $variant->product->name }}</td>
                <td>{{ $variant->sku }}</td>
                <td>{{ $variant->size }}</td>
                <td>{{ $variant->color }}</td>
                <td>{{ $variant->price }}</td>
                <td>{{ $variant->stock }}</td>
                <td>
                    <a href="{{ route('variants.show', $variant) }}">Ver</a>
                    <a href="{{ route('variants.edit', $variant) }}">Editar</a>

                    <form action="{{ route('variants.destroy', $variant) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No hay variantes</td>
            </tr>
        @endforelse
    </tbody>
</table>