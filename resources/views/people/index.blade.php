@extends('layouts.base')

@section('title', 'Listar Pessoas')

@section('content')
    <h1>Pessoas</h1>

    <a href="{{ route('people.create') }}">Nova Pessoa</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->employee_number }}</td>
                    <td>{{ $person->is_active ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        <a href="{{ route('people.show', $person->id) }}">Ver</a> |
                        <a href="{{ route('people.edit', $person->id) }}">Editar</a> |
                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline;">
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