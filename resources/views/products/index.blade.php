@extends('layouts.base')

@section('title', 'Listar Produtos')

@section('content')
    <h1>Produtos</h1>

    <a href="{{ route('products.create') }}">Novo Produto</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Serial</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Usuario</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->serial }}</td>
                    <td>{{ $product->category->name ?? 'Sem categoria' }}</td>
                    <td>{{ $product->stock?->statusLabel() ?? 'Sem status' }}</td>
                    <td>{{ $product->person?->name ?? 'Sem usuario' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Ver</a> |
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a> |
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
