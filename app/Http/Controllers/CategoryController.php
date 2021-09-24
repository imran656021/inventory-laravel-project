<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
   
    public function index()
    {
        $data = DB::table('categories')->get();
        return response()->json($data);
    }

   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            
        ]);

        $data = array();
        $data['name'] = $request->name;
        DB::table('categories')->insert($data);
    }

  
    public function show($id)
    {
       $data = DB::table('categories')->where('id',$id)->first();
       return response()->json($data);
    }

   

    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
            'name' => 'required',
            
        ]);
        $data = array();
        $data['name'] = $request->name;

        DB::table('categories')->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
    }
}
