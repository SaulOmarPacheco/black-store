<h1>Nueva variante</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('variants.store') }}" method="POST">
    @csrf

    <label>Producto</label>
    <select name="product_id">
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>

    <br><br>

    <label>SKU</label>
    <input type="text" name="sku">

    <br><br>

    <label>Talla</label>
    <input type="text" name="size">

    <br><br>

    <label>Color</label>
    <input type="text" name="color">

    <br><br>

    <label>Precio</label>
    <input type="number" step="0.01" name="price">

    <br><br>

    <label>Stock</label>
    <input type="number" name="stock">

    <br><br>

    <label>Stock mínimo</label>
    <input type="number" name="min_stock">

    <br><br>

    <label>Stock máximo</label>
    <input type="number" name="max_stock">

    <br><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('variants.index') }}">Volver</a>