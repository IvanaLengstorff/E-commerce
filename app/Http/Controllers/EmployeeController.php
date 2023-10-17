<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Employee;
use App\Models\User;
use App\Models\WorkPosition;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branches::all();
        $users = User::all();
        $workPositions = WorkPosition::all();
        return view('employees.create', compact('branches', 'users', 'workPositions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'document_number' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Employee::create([
            'name' => request('name'),
            'document_number' => request('document_number'),
            'email' => request('email'),
            'birthday' => request('birthday'),
            'ocupation' => request('ocupation'),
            'phone' => request('phone'),
            'branch_id' => request('branch_id'),
            'work_position_id' => request('work_position_id'),
            'user_id' => request('user_id'),
        ]);
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $branches = Branches::all();
        $users = User::all();
        $workPositions = WorkPosition::all();
        return view('employees.edit', compact('employee', 'branches', 'users', 'workPositions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        
        $request->validate([
            'name' => 'required',
            'document_number' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $employee->update([
            'name' => request('name'),
            'document_number' => request('document_number'),
            'email' => request('email'),
            'birthday' => request('birthday'),
            'ocupation' => request('ocupation'),
            'phone' => request('phone'),
            'branch_id' => request('branch_id'),
            'work_position_id' => request('work_position_id'),
            'user_id' => request('user_id'),
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
