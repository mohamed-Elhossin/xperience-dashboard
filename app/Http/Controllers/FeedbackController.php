<?php
// app/Http/Controllers/FeedbackController.php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        return view('feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(FeedbackRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('feedback'), $filename);
            $data['image'] = $filename;
        }

        Feedback::create($data);
        return redirect()->route('feedback.index')->with('success', 'Feedback added!');
    }

    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    public function update(FeedbackRequest $request, Feedback $feedback)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('feedback'), $filename);
            $data['image'] = $filename;
        }

        $feedback->update($data);
        return redirect()->route('feedback.index')->with('success', 'Feedback updated!');
    }

    public function destroy(Feedback $feedback)
    {
        if ($feedback->image && file_exists(public_path('feedback/' . $feedback->image))) {
            unlink(public_path('feedback/' . $feedback->image));
        }
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback deleted!');
    }
}
