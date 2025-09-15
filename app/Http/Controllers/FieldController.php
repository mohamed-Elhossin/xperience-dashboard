<?php

// app/Http/Controllers/FieldController.php
namespace App\Http\Controllers;

use App\Models\Field;
use App\Http\Requests\FieldRequest;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $fields = Field::when($search, function($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            })
            ->paginate(10);

        return view('fields.index', compact('fields', 'search'));
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(FieldRequest $request)
    {
        Field::create($request->validated());
        return redirect()->route('fields.index')->with('success', 'Field created successfully!');
    }

    public function show(Field $field)
    {
        return view('fields.show', compact('field'));
    }

    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    public function update(FieldRequest $request, Field $field)
    {
        $field->update($request->validated());
        return redirect()->route('fields.index')->with('success', 'Field updated successfully!');
    }

    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('success', 'Field deleted successfully!');
    }
}
