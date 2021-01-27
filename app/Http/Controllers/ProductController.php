<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index(){
        $product = Product::all();
        
        return response()->json([
            'success'=> true,
            'total' => count($product),
            'data'=> $product
        ], 200);
    }

    public function store(Request $request){
        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'category'=>$request->category,
        ]);

        if ($product) {
            return response()->json([
                'success'=> true,
                'message'=> 'Product Insert Success !!',
                'data'=> $product
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message'=> 'Product Insert Fail !!',
                'data'=> ''
            ], 201);
        }

    }

    public function update(){
        dd('oke');
        
    }

    public function delete(){
        dd('oke');        
        
    }
    
}
