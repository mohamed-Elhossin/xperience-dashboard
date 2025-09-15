<?php
// app/Http/Controllers/PartnerController.php
namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
 
        $search = $request->input('search');
        $partners = Partner::when($search, function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%")
              ->orWhere('description', 'LIKE', "%$search%");
        })->paginate(10);
        return view('partners.index', compact('partners', 'search'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('partners'), $filename);
            $data['image'] = $filename;
        }

        Partner::create($data);
        return redirect()->route('partners.index')->with('success', 'Partner created successfully!');
    }

    public function show(Partner $partner)
    {
        return view('partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('partners'), $filename);
            $data['image'] = $filename;
        }

        $partner->update($data);
        return redirect()->route('partners.index')->with('success', 'Partner updated successfully!');
    }

    public function destroy(Partner $partner)
    {
        // حذف الملف من public/partners (اختياري)
        if ($partner->image && file_exists(public_path('partners/' . $partner->image))) {
            unlink(public_path('partners/' . $partner->image));
        }

        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully!');
    }
}
