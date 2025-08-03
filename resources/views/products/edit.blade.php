@extends('layouts.base')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required><br><br>

        <label for="serial">Serial:</label>
        <input type="text" name="serial" id="serial" value="{{ $product->serial }}"><br><br>

        <label for="category_id">Categoria:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Atualizar</button>
    </form>
@endsection
