<?php

namespace Bcorp\lelframework\Http\Controllers;

use Bcorp\Lelframework\Chapitre;
use Bcorp\Lelframework\Manga;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MangaController extends BaseController
{
    protected $viewPath = 'lelframework';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nomManga)
    {
        $manga = Manga::where('name', 'like', $nomManga)->get()[0];
        $chaps = Chapitre::join('mangas', 'chapitres.manga_id', '=', 'mangas.id')
            ->where('mangas.id', '=', $manga->id)
            ->get();
        if(empty($chaps[0])) return redirect('/');
        return view("{$this->viewPath}::manga", compact('chaps', 'manga'));
    }

    public function encours()
    {
        $resultats = Manga::where('statut', '=', 1)->get();
        $etat = 'en cours';
        return view("{$this->viewPath}::listManga", compact('resultats', 'etat'));
    }

    public function enpause()
    {
        $resultats = Manga::where('statut', '=', 2)->get();
        $etat = 'en pause';
        return view("{$this->viewPath}::listManga", compact('resultats', 'etat'));
    }

    public function termine()
    {
        $resultats = Manga::where('statut', '=', 3)->get();
        $etat = 'terminés';
        return view("{$this->viewPath}::listManga", compact('resultats', 'etat'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
