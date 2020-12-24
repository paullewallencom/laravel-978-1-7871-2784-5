<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::paginate(5);
        return view('Employee.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $session = $request->session();
        
        $request->session()->put('key1','value1');
        
        $value = $request->session()->get('key1');
        
        $allValue = $request->session()->all();
        
        
        $request->session()->forget('key1');
        
        $request->session()->flush();
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:employee',
            'mobile' => 'required',
            'employee_code' => 'required',
            'designation' => 'required'
        ]);
        
        Employee::create($request->all());
        return redirect()->route('employee.index')
                        ->with('success','Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::find($id);
        return view('Employee.show',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        return view('Employee.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employee.index')
                        ->with('success','Employee updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Employee::find($id)->delete();
        return redirect()->route('employee.index')
                        ->with('success','Employee deleted successfully');
    }
}
