<?php

// app/Http/Controllers/SectionContentController.php

namespace App\Http\Controllers;

use App\Http\Requests\SectionContentRequest;
use Illuminate\Http\Request;
use App\Models\SectionContent;
use App\Models\Section;

class SectionContentController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');

        // Load contents with section and pay_course through section
        $contents = SectionContent::with(['section.payCourse'])
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                    ->orWhereHas('section', function ($q2) use ($search) {
                        $q2->where('name', 'LIKE', "%$search%");
                    });
            })
            ->paginate(10);

        return view('section_contents.index', compact('contents', 'search'));
    }

    public function create()
    {
        $sections = Section::with('payCourse')->get();
        return view('section_contents.create', compact('sections'));
    }

    public function store(SectionContentRequest $request)
    {
        SectionContent::create($request->validated());
        return redirect()->route('section_contents.index')->with('success', 'Content created successfully!');
    }

    public function show(SectionContent $sectionContent)
    {
        $sectionContent->load('section.payCourse');
        return view('section_contents.show', compact('sectionContent'));
    }

    public function edit(SectionContent $sectionContent)
    {
        $sections = Section::with('payCourse')->get();
        return view('section_contents.edit', compact('sectionContent', 'sections'));
    }

    public function update(SectionContentRequest $request, SectionContent $sectionContent)
    {
        $sectionContent->update($request->validated());
        return redirect()->route('section_contents.index')->with('success', 'Content updated successfully!');
    }

    public function destroy(SectionContent $sectionContent)
    {
        $sectionContent->delete();
        return redirect()->route('section_contents.index')->with('success', 'Content deleted successfully!');
    }
}
