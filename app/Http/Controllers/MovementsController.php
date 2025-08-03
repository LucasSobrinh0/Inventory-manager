<?php

namespace App\Http\Controllers;

use App\Models\Movements;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Person;
use Illuminate\Validation\Rule;

class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = Movements::with(['person', 'product'])->latest()->paginate(25);
        return view('movements.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $people = Person::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        return view('movements.create', compact('people', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', 'integer', Rule::in(array_values(Movements::TYPES))],
            'description' => 'nullable|string|max:255',
            'person_id' => 'required|exists:people,id',
            'product_id' => 'required|exists:products,id',
        ]);

        Movements::create($data);

        return redirect()->route('movements.index')->with('success', 'Movimentação criada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movements $movements)
    {
        return view('movements.show', compact('movements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movements $movements)
    {
        $people = Person::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        return view('movements.edit', compact('movements', 'people', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movements $movements)
    {
        $data = $request->validate([
            'type' => ['required', 'integer', Rule::in(array_values(Movements::TYPES))],
            'description' => 'nullable|string|max:255',
            'person_id' => 'required|exists:people,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $movements->update($data);

        return redirect()->route('movements.index')->with('success', 'Movimentação atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movements $movements)
    {
        $movements->delete();

        return redirect()->route('movements.index')->with('success', 'Movimentação removida.');
    }
}
