<?php
// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Owner;
use App\Models\Field;
use App\Http\Requests\EmployeeWithOwnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['owner', 'field'])->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeWithOwnerRequest $request)
    {
        // Create Owner first
        $ownerData = $request->input('owner');
        $ownerData['password'] = Hash::make($ownerData['password']);
        $owner = Owner::create($ownerData);

        // Create Employee linked to Owner
        $employeeData = $request->only(['linkedIn', 'image', 'field_id']);
        $employeeData['owner_id'] = $owner->id;
        Employee::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'Employee and Owner created successfully!');
    }

    public function show(Employee $employee)
    {
        $employee->load(['owner', 'field']);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'linkedIn' => 'nullable|url|max:500',
            'image' => 'nullable|string',
            'field_id' => 'required|exists:fields,id',
        ]);

        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
