<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
   
    public function index()
    {
        $data = DB::table('employees')->get();
        return response()->json($data);
    }

    
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required|unique:employees',
            'sallary' => 'required',
            'id' => 'required|unique:employees',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sallary'] = $request->sallary;
        $data['employee_id'] = $request->id;

         DB::table('employees')->insert($data);
    }

  
    public function show($id)
    {
        $data = DB::table('employees')->where('id',$id)->first();
        return response()->json($data);
    }

   
   
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'sallary' => 'required',
            'employee_id' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sallary'] = $request->sallary;
        $data['employee_id'] = $request->employee_id;
        

         DB::table('employees')->where('id', $id)->update($data);
    }
    
    
    public function destroy($id)
    {
        DB::table('employees')->where('id', $id)->delete();
    }
}
