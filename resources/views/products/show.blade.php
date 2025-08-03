@extends('layouts.base')

@section('title', 'Detalhes do Produto')

@section('content')
    <h1>Detalhes do Produto</h1>

    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Nome:</strong> {{ $product->name }}</p>
    <p><strong>Serial:</strong> {{ $product->serial ?? '---' }}</p>
    <p><strong>Categoria:</strong> {{ $product->category->name ?? '---' }}</p>
    <p><strong>Status:</strong> {{ $product->stock?->statusLabel() ?? '---' }}</p>
    <p><strong>Status:</strong> {{ $product->person?->name ?? 'Sem usuario' }}</p>
    

    <a href="{{ route('products.index') }}">Voltar</a>
@endsection
