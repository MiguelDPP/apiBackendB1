<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Validator;
Use \stdClass;
Use App\File;
use Illuminate\Support\Facades\Hash;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $foods = Food::all();
        return $foods; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:food',
            'description' => 'required',
            'count' => 'required',
            'price' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        };
 
        //Mover la imagen de la ruta temporal a la carpeta store


        $path = '';
        $allowedfileExtension=['jpeg','jpg','png'];
        $file = $request->file('featured');
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension,$allowedfileExtension);
        if($check) {
            $path = $file->store('public/features');
            $name = $file->getClientOriginalName();
        }

        $path = str_replace('public', 'storage', $path);
        //$path_end = $request->file('featured')->store('public/foods');
        
        //$url_featured = Storage::url($path_end);

        $url_featured  = '';
        $user = Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'count' => $request->count,
            'price' => $request->price,
            'featured' => $path,
            'type' => $request->type,
        ]);


        return response()->json([
            'type_response' => '1',
            'data' => 'Añadida Correctamente',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        //
    }
}
