<h1>Detalle de categoría</h1>

<p><strong>ID:</strong> {{ $category->id }}</p>
<p><strong>Nombre:</strong> {{ $category->name }}</p>
<p><strong>Descripción:</strong> {{ $category->description }}</p>

<a href="{{ route('categories.index') }}">Volver</a>