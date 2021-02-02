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

    public function getId($id){
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'success'=> true,
                'message'=> 'Product found',
                'data'=> $product
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message'=> 'Product not found',
                'data'=> ''
            ], 404);
        }
       
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
            ], 201);
        }else {
            return response()->json([
                'success'=> false,
                'message'=> 'Product Insert Fail !!',
                'data'=> ''
            ], 400);
        }

    }

    public function update(Request $request, $id){
        $product= Product::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category = $request->category;  
            $product->save();
            return response()->json([
                'success'=> true,
                'message'=> 'Product Updated Successfully !!',
                'data'=> $product
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message'=> 'Product not found',
                'data'=> ''
            ], 404);
        }
    }

    public function destroy($id){
        $product= Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'Product Deleted Successfully !!',
                'data'=> $product
            ], 200);
        }else {
            return response()->json([
                'success'=> false,
                'message'=> 'Product not found',
                'data'=> ''
            ], 404);
        }
        
    }
    
}
