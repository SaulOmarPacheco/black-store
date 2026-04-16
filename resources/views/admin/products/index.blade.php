<h1>Productos</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('products.create') }}">Nuevo producto</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Marca</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($product->image_path)
                        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" width="80">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->active ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}">Ver</a>
                    <a href="{{ route('products.edit', $product) }}">Editar</a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No hay productos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>