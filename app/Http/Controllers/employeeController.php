<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('employee.create')
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
            'name'=>'required',
            'age'=>'required',
            'email'=>'required'
        ]);

        $contact = new Contact([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'email' => $request->get('email'),
        
        ]);
        $contact->save();
        return redirect('/employee')->with('success', 'Employee saved!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $employee = employee::find($id);
        return view('employee.edit', compact('employee')); 
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
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'email'=>'required'
        ]);

        $contact = Contact::find($id);
        $contact->name =  $request->get('first_name');
        $contact->age = $request->get('age');
        $contact->email = $request->get('email');
    
        $contact->save();

        return redirect('/employee')->with('success', 'Employees updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();

        return redirect('/employee')->with('success', 'employee deleted!');
    }
}
