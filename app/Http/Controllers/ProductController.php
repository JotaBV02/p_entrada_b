<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /** Display a listing of the resource.*/
    public function index()
    {
       return response()->json(
            [
                'success'=>true,
                'message'=> 'Lista de Productos',
                'data' => Product::with('category')->get()
            ]
            );
    }

    /** Show the form for creating a new resource.*/
    public function create()
    {
        //
    }

    /** Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric|min:0.01',
            'stock'=>'required|integer|min:1',
            'category_id'=>'required|exists:categories,id',
        ]);

        $product = Product::create($validated);

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Producto creado',
                'data' => $product->load('category')
            ],201
            );
    }

    /** Display the specified resource.*/
    public function show(Product $product)
    {
        return response()->json(
            [
                'success'=>true,
                'data' => $product->load('category')
            ],
            );
    }

    /**Show the form for editing the specified resource.*/
    public function edit(Product $product)
    {
        //
    }

    /**Update the specified resource in storage.*/
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric|min:0.01',
            'stock'=>'required|integer|min:1',
            'category_id'=>'required|exists:categories,id',
        ]);

        $product->update($validated);

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Producto actualizado',
                'data' => $product->load('category')
            ]
            );
    }

    /**Remove the specified resource from storage.*/
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Producto eliminado',
            ]
        );
    }
}
