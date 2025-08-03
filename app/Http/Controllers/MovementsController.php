<?php

namespace App\Http\Controllers;

use App\Models\Movements;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

        $product = Product::findOrFail($data['product_id']);
        $person = Person::findOrFail($data['person_id']);

        if (!$product){
            return redirect()->back()->with('error', 'Selecione um produto')->withInput();
        }

        if (!$person){
            return redirect()->back()->with('error', 'Selecione uma pessoa')->withInput();
        }


        // tipo 1 é entrega
        // tipo 0 é devolução

        if ($data['type'] == '0'){
            if ($product['person_id'] == $person['id']){
                $product->person_id = null;
                $product->setInStock($product);
                $product->save();
            } else{
                return redirect()->back()->with('error', 'Esse produto nao pertence a essa pessoa')->withInput();
            }

        } elseif ($data['type'] == '1'){
            if ($product['person_id'] == null && $person){
                $product->person_id = $person->id;
                $product->setInUse($product);
                $product->save();
            } else{
                return redirect()->back()->with('error', 'Produto em uso')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Tipo de movimentação invalida')->withInput();
        }

        Movements::create($data);

        return redirect()->route('movements.index')->with('success', 'Movimentação criada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movements $movement)
    {
        return view('movements.show', ['movement' => $movement]);
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
     * Essa linha foi comentada, pois nao faz sentido, a pessoa modificar uma movimentação.
     * Faz sentido, ela criar uma nova, mas uma movimentação feita, nao pode ser desfeita. nao faz nem sentido isso
     */
    // public function update(Request $request, Movements $movements)
    // {
    //     $data = $request->validate([
    //         'type' => ['required', 'integer', Rule::in(array_values(Movements::TYPES))],
    //         'description' => 'nullable|string|max:255',
    //         'person_id' => 'required|exists:people,id',
    //         'product_id' => 'required|exists:products,id',
    //     ]);

    //     $movements->update($data);

    //     return redirect()->route('movements.index')->with('success', 'Movimentação atualizada.');
    // }

    /**
     * Remove the specified resource from storage.
     * Não faz sentido a pessoa remover uma movimentação
     */
    // public function destroy(Movements $movement)
    // {   
    //     $product = Product::findOrFail($movement['product_id']);
    //     $product->setInStock($product);
    //     $movement->delete();
    //     return redirect()->route('movements.index')->with('success', 'Movimentação removida.');
    // }

}
