@extends('layouts.base')

@section('title', 'Nova Pessoa')

@section('content')
    <h1>Nova Pessoa</h1>

    <form method="POST" action="{{ route('people.store') }}">
        @csrf

        <label for="name">Nome:</label>
        <input placeholder="Joao Santos" type="text" name="name" id="name" required><br><br>

        <label for="employee_number">Matricula:</label>
        <input placeholder="ABC1234" type="text" name="employee_number" id="employee_number"><br><br>

        <label for="is_active">Status:</label>
        <select name="is_active" id="is_active" required>
            <option disabled selected>Selecione o status</option>
            <option value=1>Ativo</option>
            <option value=0>Inativo</option>
        </select><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
