@extends('layouts.base')

@section('title', 'Detalhes da Movimentação')

@section('content')
    <h1>Detalhes da Movimentação</h1>

    <p><strong>ID:</strong> {{ $movement->id }}</p>
    <p><strong>Tipo:</strong> {{ $movement->type_label }}</p>
    <p><strong>Descrição:</strong> {{ $movement->description ?: '-' }}</p>
    <p><strong>Pessoa:</strong> {{ $movement->person?->name ?? '-' }}</p>
    <p><strong>Produto:</strong> {{ $movement->product?->name ?? '-' }}</p>
    <p><strong>Data:</strong> {{ $movement->created_at?->format('d/m/Y H:i') ?? '-' }}</p>

    <a href="{{ route('movements.index') }}">Voltar</a>
@endsection
