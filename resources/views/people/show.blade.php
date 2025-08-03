@extends('layouts.base')

@section('title', 'Detalhes da Pessoa')

@section('content')
    <h1>Detalhes da Pessoa</h1>

    <p><strong>Nome:</strong> {{ $person->name }}</p>
    <p><strong>Matrícula:</strong> {{ $person->employee_number }}</p>
    <p><strong>Status:</strong> {{ $person->is_active ? 'Ativo' : 'Inativo' }}</p>

    <a href="{{ route('people.edit', $person->id) }}">Editar</a> |
    <a href="{{ route('people.index') }}">Voltar</a>
@endsection
