<?php

namespace Bcorp\lelframework\Http\Controllers;


use File;
use Storage;
use Bcorp\Lelframework\Chapitre;
use Bcorp\Lelframework\Manga;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class LectureController extends BaseController
{
    protected $viewPath = 'lelframework';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($manga, $chapitre)
    {
        $nomManga = $manga;
        // TODO : ajouter le compteur de vue
        $numeroChap =  str_replace('ch', '', $chapitre);
        $manga = Manga::where('name', 'like', $nomManga)->get()[0];
        $chap = Chapitre::join('mangas', 'chapitres.manga_id', '=', 'mangas.id')
            ->where('mangas.id', '=', $manga->id)
            ->where('numero', '=', $numeroChap)
            ->get();
        if(empty($chap[0])) return redirect('/');

        $files = collect(File::allFiles(storage_path('app/public/').''.$nomManga.'/'.$chapitre.'/'))->sortBy(function ($file) {
            return $file->getBaseName();
        }, SORT_NATURAL);
       $temp = [];
        foreach ($files as $newfile) {
            $temp[] = str_replace(storage_path('app/public/'), 'storage/', $newfile);
        }

        $chapAvant = Chapitre::join('mangas', 'chapitres.manga_id', '=', 'mangas.id')
            ->where('mangas.id', '=', $manga->id)
            ->where('numero', '=', $numeroChap-1)
            ->get();
        $chapApres = Chapitre::join('mangas', 'chapitres.manga_id', '=', 'mangas.id')
            ->where('mangas.id', '=', $manga->id)
            ->where('numero', '=', $numeroChap+1)
            ->get();
        $navigation = compact('chapAvant', 'chapApres');
        $files = $temp;
        return view("{$this->viewPath}::lel", compact('files', 'chap', 'navigation', 'info'));
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
