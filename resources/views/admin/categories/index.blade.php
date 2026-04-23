@extends('layouts.admin')

@section('content')

<h1>Categorías</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('categories.create') }}">Nueva categoría</a>

<form method="GET" action="{{ route('categories.index') }}" style="margin-bottom: 15px;">
    <input type="text" name="search" placeholder="Buscar categoría por nombre" value="{{ $search ?? '' }}">
    <button type="submit" class="btn">Buscar</button>
    <a href="{{ route('categories.index') }}" class="btn" style="text-decoration:none;">Limpiar</a>
</form>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}">Ver</a>
                    <a href="{{ route('categories.edit', $category) }}">Editar</a>

                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay categorías registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection