<?php
// app/Http/Controllers/RealController.php
namespace App\Http\Controllers;

use App\Models\Real;
use App\Models\Pay_course;
use App\Http\Requests\RealRequest;
use Illuminate\Http\Request;

class RealController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $reals = Real::with('payCourse')
            ->when($search, function($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('url', 'LIKE', "%$search%");
            })
            ->paginate(10);

        return view('reals.index', compact('reals', 'search'));
    }

    public function create()
    {
        $payCourses = Pay_course::all();
        return view('reals.create', compact('payCourses'));
    }

    public function store(RealRequest $request)
    {
        Real::create($request->validated());
        return redirect()->route('reals.index')->with('success', 'Real item created successfully!');
    }

    public function show(Real $real)
    {
        $real->load('payCourse');
        return view('reals.show', compact('real'));
    }

    public function edit(Real $real)
    {
        $payCourses = Pay_course::all();
        return view('reals.edit', compact('real', 'payCourses'));
    }

    public function update(RealRequest $request, Real $real)
    {
        $real->update($request->validated());
        return redirect()->route('reals.index')->with('success', 'Real item updated successfully!');
    }

    public function destroy(Real $real)
    {
        $real->delete();
        return redirect()->route('reals.index')->with('success', 'Real item deleted successfully!');
    }
}
