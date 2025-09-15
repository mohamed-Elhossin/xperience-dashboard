<?php
// app/Http/Controllers/InstructorController.php
namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Field;
use App\Http\Requests\InstructorRequest;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $instructors = Instructor::with('field')
            ->when($search, function($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            })
            ->paginate(10);

        return view('instructors.index', compact('instructors', 'search'));
    }

    public function create()
    {
        $fields = Field::all();
        return view('instructors.create', compact('fields'));
    }

    public function store(InstructorRequest $request)
    {
        Instructor::create($request->validated());
        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully!');
    }

    public function show(Instructor $instructor)
    {
        $instructor->load('field');
        return view('instructors.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        $fields = Field::all();
        return view('instructors.edit', compact('instructor', 'fields'));
    }

    public function update(InstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());
        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully!');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully!');
    }
}
