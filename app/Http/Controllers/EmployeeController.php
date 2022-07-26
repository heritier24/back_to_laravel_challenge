<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employees::all(['id', 'names', 'gender', 'phonenumber']);

        return response()->json([
            'employees' => $employee
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'gender' => 'required',
            'phonenumber' => 'required',
        ]);
        $employee = Employees::create([
            'names' => $request->names,
            'gender' => $request->gender,
            'phonenumber' => $request->phonenumber
        ]);
        return response()->json([
            'employee' => $employee
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'names' => 'required',
            'gender' => 'required',
            'phonenumber' => 'required',
        ]);
        $employee = Employees::where('id', $id)->update([
            'names' => $request->names,
            'gender' => $request->gender,
            'phonenumber' => $request->phonenumber
        ]);
        return response()->json([
            'employee' => $employee
        ], 201);
    }
    public function delete($id)
    {
           $employee = Employees::find($id);
           $employee->delete();
    }
}
