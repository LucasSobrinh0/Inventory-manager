@extends('layouts.base')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="serial">Serial:</label>
        <input type="text" name="serial" id="serial"><br><br>

        <label for="category_id">Categoria:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
