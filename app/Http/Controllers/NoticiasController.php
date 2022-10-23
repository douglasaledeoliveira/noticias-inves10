<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiasRequest;
use App\Http\Requests\UpdateNoticiasRequest;
use App\Models\Noticias;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::all();

        return view('noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Display a listing of home.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $search = request('search');      

        if($search) {
            $noticias = Noticias::where([['title', 'like', '%'.$search.'%']])->get();
        } else {
            $noticias = Noticias::all();
        }  

        return view('home', ['noticias' => $noticias, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticiasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticiasRequest $request)
    {
        $noticia = new Noticias;

        $noticia->title = $request->title;
        $noticia->subtitle = $request->subtitle;
        $noticia->description = $request->description;
        $noticia->slug = Str::slug($noticia->title, '-');

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/noticias'), $imageName);
            $noticia->image = $imageName;
        }

        $noticia->save();

        return redirect('/')->with('success', 'Notícia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(string $noticia)
    {
        $artigo = Noticias::where('slug', $noticia)->get();

        foreach($artigo as $item)
        {
            $artigo = $item;
        }

        return view('noticias.show', ['artigo' => $artigo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if (!$artigo = Noticias::find($id))
            return redirect()->route('noticias.index');

        $noticia = $artigo;

        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiasRequest  $request
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiasRequest $request, int $id)
    {
        if (!$artigo = Noticias::find($id))
            return redirect()->route('noticias.index');

        $data = $request->all();

        if ($request->image) {
            if ($artigo->image && Storage::exists($artigo->image)) {
                Storage::delete($artigo->image);
            }

            $data['image'] = $request->image->store('noticias');
        }

        $artigo->update($data);

        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {  
        if (!$artigo = Noticias::find($id))
            return redirect()->route('noticias.index');
              
        $artigo->delete();

        return redirect()->route('noticias.index');
    }
}
