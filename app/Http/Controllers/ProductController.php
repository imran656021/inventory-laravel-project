<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\product;

class ProductController extends Controller
{
   
    public function index()
    {
        $data = DB::table('products')
                   ->join('categories','products.category_id', 'categories.id')
                   ->join('suppliers', 'products.supplier_id', 'suppliers.id')
                   ->select('categories.name', 'suppliers.name', 'products.*')
                   ->orderBy('products.id', 'DESC')
                   ->get();

                   return response()->json($data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:255',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'root' => 'required',
            'product_quantity' => 'required',
            
            
        ]);
        $image = $request->image;
        if($image){

            // $imageName = time();
    		// $ext = strtolower($image->extension());
    		// $image_full_name = $imageName.'.'.$ext;
    		// $uploadPath = 'backend/productImage/';
    		// $image_url = $uploadPath.$image_full_name;
    		// $success = $image->move($uploadPath, $image_full_name);
            
    		


            $img = $image;
            $position = strpos($img, ';');
            $sub = substr($img, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time().".".$ext;
            
            $uploadPath = 'backend/productImage/';
            $imageUrl = $uploadPath.$name;
           

    
            $product = new product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->product_quantity = $request->product_quantity;
            $product->selling_date = $request->selling_date;
            $product->image = $imageUrl;
            $product->save();
            $image->move($uploadPath, $name);
        }else{
            $product = new product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->product_quantity = $request->product_quantity;
            $product->selling_date = $request->selling_date;
            
            $product->save();
        }
    }

   
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
