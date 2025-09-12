<?php

// app/Http/Controllers/SectionController.php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Pay_course;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sections = Section::with('payCourse')
            ->when($search, function($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            })
            ->paginate(10);

        return view('sections.index', compact('sections', 'search'));
    }

    public function create()
    {
        $payCourses = Pay_course::all();
        return view('sections.create', compact('payCourses'));
    }

    public function store(SectionRequest $request)
    {
        Section::create($request->validated());
        return redirect()->route('sections.index')->with('success', 'Section created successfully!');
    }

    public function show(Section $section)
    {
        $section->load('payCourse');
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        $payCourses = Pay_course::all();
        return view('sections.edit', compact('section', 'payCourses'));
    }

    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return redirect()->route('sections.index')->with('success', 'Section updated successfully!');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully!');
    }
}
