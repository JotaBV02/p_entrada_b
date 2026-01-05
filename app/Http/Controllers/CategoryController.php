<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** Display a listing of the resource.*/
    public function index()
    {
        return response()->json(
            [
                'success'=>true,
                'message'=> 'Lista de Categorías',
                'data' => Category::all()
            ]
            );
    }

    /** Show the form for creating a new resource.*/
    public function create()
    {
        //
    }

    /**Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255'
        ]);

        $category = Category::create($request->only('name'));

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Categoría creada',
                'data' => $category
            ],201
            );
    }

    /**Display the specified resource.*/
    public function show(Category $category)
    {
        return response()->json(
            [
                'success'=>true,
                'data' => $category
            ]
            );
    }

    /**Show the form for editing the specified resource.*/
    public function edit(Category $category)
    {
        //
    }

    /**Update the specified resource in storage.*/
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|string|max:255'
        ]);

        $category->update($request->only('name'));

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Categoría actualizada',
                'data' => $category
            ]
        );

    }

    /**Remove the specified resource from storage.*/
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(
            [
                'success'=>true,
                'message'=> 'Categoría eliminada',
                'data' => $category
            ]
        );
    }
}
