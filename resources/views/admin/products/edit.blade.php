<h1>Editar producto</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Categoría</label>
        <select name="category_id">
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <div>
        <label>Marca</label>
        <input type="text" name="brand" value="{{ old('brand', $product->brand) }}">
    </div>

    <div>
        <label>Ruta de imagen</label>
        <input type="text" name="image_path" value="{{ old('image_path', $product->image_path) }}">
    </div>

    <div>
        <label>
            <input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
            Activo
        </label>
    </div>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('products.index') }}">Volver</a>