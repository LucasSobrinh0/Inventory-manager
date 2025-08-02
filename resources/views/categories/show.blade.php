@extends('layouts.base')

@section('title', 'Listar Categorias')

@section('content')

    <h1>Detalhes da Categoria</h1>

    <p><strong>ID:</strong> {{ $category->id }}</p>
    <p><strong>Nome:</strong> {{ $category->name }}</p>

    <a href="{{ route('categories.index') }}">Voltar</a>
@endsection
