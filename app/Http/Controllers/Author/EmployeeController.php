<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        return response()->json(['success' => true, 'employees' => $employees]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'position' => 'nullable|max:100',
            'email' => 'nullable|email',
        ]);

        Employee::create($request->all());

        return response()->json(['success' => true]);
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        return response()->json(['success' => true, 'employee' => $employee]);
    }

    public function update(Request $request, $id) {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return response()->json(['success' => true]);
    }

    public function show($id) {
        $employee = Employee::findOrFail($id);
        return response()->json(['success' => true, 'employee' => $employee]);
    }

    public function destroy($id) {
        Employee::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
