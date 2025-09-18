<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $contacts = Contact::when($search, function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%")
              ->orWhere('subject', 'LIKE', "%$search%");
        })->paginate(10);

        return view('contacts.index', compact('contacts', 'search'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contact message created successfully!');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());
        return redirect()->route('contacts.index')->with('success', 'Contact message updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact message deleted successfully!');
    }
}
