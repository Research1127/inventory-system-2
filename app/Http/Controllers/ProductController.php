<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all products---------------------------------
    public function index(){
       
        $products = Product::all();
        return response()->json($products,200);
        
    }
    // Get single product by ID
    public function show($id){
        $product = Product::findOrFail($id);
        return response()->json([
            'message' => 'Product retrieved successfully',
            'product' => $product], 200);
    }

    // Add new product // Create product---------------------------------
    public function store(Request $request){
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

    
        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product], 201);
    }

      // Update existing product---------------------------------
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);


        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }

    // Delete product---------------------------------
    public function destroy($id){
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'],200);
    }
}
