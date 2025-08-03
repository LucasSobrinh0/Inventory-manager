<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();

        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'employee_number' => 'required|string|max:30',
            'is_active' => 'required|boolean',
        ]);

        Person::create($request->only('name', 'employee_number', 'is_active'));
        return redirect()->route('people.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:100',
            'employee_number' => 'nullable|string|max:30',
            'is_active' => 'nullable|boolean',
        ]);

        $person->update($data);

        return redirect()->route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('people.index');
    }
}
