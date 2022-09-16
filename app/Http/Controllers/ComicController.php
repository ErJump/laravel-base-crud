<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    protected $validationArray = [
        'title' => 'required|string|min:3|max:255|unique:comics,title',
        'description' => 'required|min:3|string',
        'thumb' => 'required|active_url',
        'price' => 'required|numeric',
        'series' => 'required|string|min:3|max:255',
        'sale_date' => 'required|date',
        'type' => 'required|exists:comics,type',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comic = new Comic();
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = $request->validate($this->validationArray);
        $comic = new Comic();
        /* $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        // $revertedDate = date('Y-m-d', strtotime($data['sale_date'])); 
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->slug = Str::slug($comic['title'], '-');
        $comic->save(); */
        $data['slug'] = Str::slug($data['title'], '-');
        $comic->fill($data);
        $comic->save();
        return redirect()->route('comics.show', $comic->slug)->with('result-message', '"'.$data['title'].'" successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->firstOrFail();
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //$comic = Comic::findOrFail($id); tramite id
        $comic = Comic::where('slug', $slug)->firstOrFail();
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //$data = $request->all();
        $data = $request->validate($this->validationArray);
        //$comic = Comic::find($id);
        $comic = Comic::where('slug', $slug)->firstOrFail();
        //! Assegnazione manuale
        /* $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type']; */
        //$comic->slug = Str::slug($comic['title'], '-');
        //$comic->save();
        $data['slug'] = Str::slug($data['title'], '-');
        //! Assegnazione automatica con fillable con metodo fill + save
        /* $comic->fill($data);
        $comic->save(); */
        //! Assegnazione automatica con metodo update
        $comic->update($data);
        return redirect()->route('comics.index')->with('result-message', '"'.$data['title'].'" successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $deleteComic = Comic::where('slug', $slug)->firstOrFail();
        $deleteComic->delete();
        return redirect()->route('comics.index')->with('result-message', '"'.$deleteComic->title.'" successfully removed');
    }
}
