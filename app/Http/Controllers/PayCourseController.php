<?php
// app/Http/Controllers/PayCourseController.php
namespace App\Http\Controllers;

use App\Models\Pay_course;
use App\Http\Requests\PayCourseRequest;
use Illuminate\Http\Request;

class PayCourseController extends Controller
{
    public function index(Request $request)
    {
       
        $search = $request->input('search');
        $items = Pay_course::when($search, function($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
            })
            ->paginate(10);
        return view('pay_courses.index', compact('items', 'search'));
    }

    public function create()
    {
        return view('pay_courses.create');
    }

    public function store(PayCourseRequest $request)
    {
        $data = $request->validated();

        // Save image in /public/pay_courses
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('pay_courses'), $imageName);
            $data['image'] = $imageName;
        }

        Pay_course::create($data);
        return redirect()->route('pay-courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function show(Pay_course $pay_course)
    {
        return view('pay_courses.show', compact('pay_course'));
    }

    public function edit(Pay_course $pay_course)
    {
        return view('pay_courses.edit', compact('pay_course'));
    }

    public function update(PayCourseRequest $request, Pay_course $pay_course)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('pay_courses'), $imageName);
            $data['image'] = $imageName;
        }

        $pay_course->update($data);
        return redirect()->route('pay-courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Pay_course $pay_course)
    {
        $pay_course->delete();
        return redirect()->route('pay-courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
