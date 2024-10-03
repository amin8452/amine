<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = Categorie::all();
            return response()->json($categories);
        } catch(\Exception $e){
            return response()->json("probléme de récuperation");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categories = new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie")
            ]);
            $categories->save();
            return response()->json($categories);
        } catch(\Exception $e){
            return response()->json("probléme de récuperation");
        }
    }
public function show($id){
    try{
        $categories = Categorie::findOrFail($id);
        return response()->json($categories);
        } catch(\Exception $e){
            return response()->json($e->getMessage());
        }
}
    /**
     * Display the specified resource.
     */
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try{
            $categories = Categorie::findOrFail($id);
            $categories->update($request->all());
            return response()->json($categories);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categories=Categorie::findOrFail($id);
$categories->delete();
            return response()->json("categorie supprime avec succés");

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
       
    }
}
