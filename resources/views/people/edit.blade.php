@extends('layouts.base')

@section('title', 'Editar Pessoa')

@section('content')

    <h1>Editar Categoria</h1>

    <form method="POST" action="{{ route('people.update', $person->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $person->name }}" required>

        <label for="employee_number">Matricula:</label>
        <input type="text" name="employee_number" id="employee_number" value="{{ $person->employee_number }}"><br><br>
        
        @php($current = old('is_active', $person->is_active))

        <label for="is_active">Status:</label>
        <select name="is_active" id="is_active" required>
            <option disabled {{ is_null($current) ? 'selected' : '' }}>Selecione o status</option>
            <option value=1 {{ $current == 1 ? 'selected' : '' }}>Ativo</option>
            <option value=0 {{ $current == 0 ? 'selected' : '' }}>Inativo</option>
        </select>

        <button type="submit">Atualizar</button>
    </form>
@endsection