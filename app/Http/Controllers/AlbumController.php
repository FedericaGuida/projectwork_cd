<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Singer;
use App\Models\Recordcompany;
use App\Models\Category;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function validateData(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|min:3|max:255',
            'singer_id' => 'required|exists:singers,id',
            'recordcompany_id' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'tracks' => 'required|string',
            'duration' => 'required',
            'category' => 'required|array',
            'category.*' => 'exists:categories,id',
        ]);
    }

    public function index()
    {
        $singers = Singer::all();
        $recordcompanies = Recordcompany::all();
        $categories = Category::all();
        $albums = Album::all();
        return view('albums.index', compact('albums', 'singers', 'recordcompanies', 'categories'));
    }

    public function index_admin()
    {
        $singers = Singer::all();
        $recordcompanies = Recordcompany::all();

        $albums = Album::paginate(6);
        return view('admin.albums.index', compact('albums', 'singers', 'recordcompanies'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $singers = Singer::all();
        $recordcompanies = Recordcompany::all();
        $categories = Category::all();
        return view('admin.albums.create', compact('categories', 'singers', 'recordcompanies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $this->validateData($request);

        // Creazione di un nuovo album con i dati validati
        $album = new Album;
        $album->fill($validatedData);

        $album->save();
        //aggiungiamo le categorie

        $album->category()->attach($request->category);
        return redirect()->route('admin.albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::find($id);
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $singers = Singer::all();
        $recordcompanies = Recordcompany::all();
        $categories = Category::all();
        $album = Album::find($id);
        return view('admin.albums.edit', compact('album', 'singers', 'recordcompanies', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validazione dei dati
        $validatedData = $this->validateData($request);
        // Aggiornamento dei dati dell' album con quelli validati

        $album = Album::find($id);
        $album->update($validatedData);
        // $album->update($request->all());

        // Aggiornamento delle categorie
        $album->category()->sync($request->category);

        return redirect()->route('admin.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('admin.albums.index');
    }
}
