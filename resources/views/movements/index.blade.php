@extends('layouts.base')

@section('title', 'Listar Movimentações')

@section('content')
    <h1>Movimentações</h1>

    <a href="{{ route('movements.create') }}">Nova Movimentação</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Pessoa</th>
                <th>Produto</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movements as $movement)
                <tr>
                    <td>{{ $movement->type ? 'Entrega' : 'Devolução' }}</td>
                    <td>{{ $movement->description }}</td>
                    <td>{{ $movement->person?->name ??  '-' }}</td>
                    <td>{{ $movement->product?->name ?? '-' }}</td>
                    <td>{{ $movement->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('movements.show', $movement->id) }}">Ver</a>
                        <!-- <form action="{{ route('movements.destroy', $movement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection