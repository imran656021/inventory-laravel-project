<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    
    public function index()
    {
        $data = DB::table('suppliers')->get();
        return response()->json($data);
    }

   

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:suppliers',
            'phone' => 'required|unique:suppliers',
            'user_id' => 'required|unique:suppliers',
            'shop_name' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['user_id'] = $request->user_id;
        $data['shop_name'] = $request->shop_name;

         DB::table('suppliers')->insert($data);
    }


    public function show($id)
    {
        $data = DB::table('suppliers')->where('id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'shop_name' => 'required',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['user_id'] = $request->user_id;
        $data['shop_name'] = $request->shop_name;

        DB::table('suppliers')->where('id',$id)->update($data);
    }

    
    public function destroy($id)
    {
        DB::table('suppliers')->where('id', $id)->delete();
    }
}
