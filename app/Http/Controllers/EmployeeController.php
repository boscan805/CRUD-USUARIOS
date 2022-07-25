<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos ['employees'] = Employee::paginate(5);
        return view('Employees.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $EmployeeData =  request()->except('_token');

        Employee::insert($EmployeeData);

        if ($request->hasFile('Image')) {

            $EmployeeData['Image'] = $request->file('Image')->store('uploads', 'public');
        }

        return redirect('Employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee= Employee::findOrFail($id);
        return view('Employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $EmployeeData =  request()->except(['_token', '_method']);

        if ($request->hasFile('Image')) {
            $employee= Employee::findOrFail($id);
            Storage::delete('public/'.$employee->Image);
            $EmployeeData['Image'] = $request->file('Image')->store('uploads', 'public');
        }

        Employee::where('id', '=', $id)->update($EmployeeData);
        
        $employee= Employee::findOrFail($id);
        return view('Employees.edit', compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee= Employee::findOrFail($id);

       if(Storage::delete('public/' .$employee->Image)) {

        Employee::destroy($id);
       }

      
        return redirect('Employees');
    }
}
