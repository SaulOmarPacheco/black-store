<h1>Editar categoría</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}">
    </div>

    <div>
        <label>Descripción</label>
        <textarea name="description">{{ old('description', $category->description) }}</textarea>
    </div>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('categories.index') }}">Volver</a>