@extends('layouts.base')

@section('title', 'Listar Categorias')

@section('content')

    <h1>Editar Categoria</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>

        <button type="submit">Atualizar</button>
    </form>
@endsection