<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorie');
    }
    
    public function searchCat()
    {
        if(request('q') != "null"){
            $q = request('q');
            $cats['data'] = Categorie::where('title', 'LIKE', "%{$q}%")->get();
            return response()->json($cats);
        }else{
            return $this->refresh();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/home')->withErrors($validator)->withInput();
        } 
        Categorie::create($request->all());
        return $this->refresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        $cats = Categorie::orderBy('id','DESC')->get();
        return response()->json($cats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $categorie->update([
            'title' => $request->title
        ]);
        return $this->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        if($categorie->delete()){
            return $this->refresh();
        }else{
            return response()->json(['error' => 'destroy function error'], '425');
        }
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        return $this->refresh();
    }

    public function getCats(){
        $cats = Categorie::orderBy('id','DESC')->get();
        return response()->json($cats);
    }

    public function refresh(){
        $cat = Categorie::orderBy('id','DESC')->paginate(6);
        return response()->json($cat);
    }
}
