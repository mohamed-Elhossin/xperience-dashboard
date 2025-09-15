<?php
// app/Http/Controllers/OwnerController.php
namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\OwnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $owners = Owner::when($search, function($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%");
        })->paginate(10);

        return view('owners.index', compact('owners', 'search'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(OwnerRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        Owner::create($data);

        return redirect()->route('owners.index')->with('success', 'Owner created successfully!');
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(OwnerRequest $request, Owner $owner)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $owner->update($data);

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully!');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully!');
    }
}
