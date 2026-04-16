<h1>Editar variante</h1>

<form action="{{ route('variants.update', $variant) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Producto</label>
    <select name="product_id">
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ $variant->product_id == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>SKU</label>
    <input type="text" name="sku" value="{{ $variant->sku }}">

    <br><br>

    <label>Talla</label>
    <input type="text" name="size" value="{{ $variant->size }}">

    <br><br>

    <label>Color</label>
    <input type="text" name="color" value="{{ $variant->color }}">

    <br><br>

    <label>Precio</label>
    <input type="number" step="0.01" name="price" value="{{ $variant->price }}">

    <br><br>

    <label>Stock</label>
    <input type="number" name="stock" value="{{ $variant->stock }}">

    <br><br>

    <label>Stock mínimo</label>
    <input type="number" name="min_stock" value="{{ $variant->min_stock }}">

    <br><br>

    <label>Stock máximo</label>
    <input type="number" name="max_stock" value="{{ $variant->max_stock }}">

    <br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('variants.index') }}">Volver</a>