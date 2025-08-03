@extends('layouts.base')

@section('title', 'Nova Movimentação')

@section('content')
    <h1>Nova Movimentação</h1>

    @php use App\Models\Movements; @endphp
    <form method="POST" action="{{ route('movements.store') }}">
        @csrf

        <label for="type">Tipo:</label>
        @php($currentType = old('type'))
        <select name="type" id="type" required>
            <option disabled {{ is_null($currentType) ? 'selected' : '' }}>Selecione o tipo</option>
            <option value=1>Entregar</option>
            <option value=2>Devolver</option>
            <!-- @foreach (Movements::TYPES as $name => $value)
                <option value="{{ $value }}" {{ $currentType == $value ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach -->
        </select><br><br>

        <label for="description">Descrição:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}"><br><br>

        <label for="person_id">Pessoa:</label>
        <select name="person_id" id="person_id" required>
            <option disabled {{ !old('person_id') ? 'selected' : '' }}>Selecione a pessoa</option>
            @foreach ($people as $person)
                <option value="{{ $person->id }}" {{ old('person_id') == $person->id ? 'selected' : '' }}>
                    {{ $person->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="product_id">Produto:</label>
        <select name="product_id" id="product_id" required>
            <option disabled {{ !old('product_id') ? 'selected' : '' }}>Selecione o produto</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
