@extends('layouts.base')

@section('title', 'Listar Categorias')

@section('content')

    <h1>Nova Categoria</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Salvar</button>
    </form>

@endsection
