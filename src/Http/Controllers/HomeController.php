<?php

namespace Bcorp\lelframework\Http\Controllers;

use Bcorp\Lelframework\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    protected $viewPath = 'lelframework';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sorties = Chapitre::join('mangas', 'chapitres.manga_id', '=', 'mangas.id')
            ->orderBy('chapitres.created_at', 'desc')->take(10)->get();
        $mangas = [];
        foreach ($sorties as $sortie) {
                $mangas[$sortie->manga_id][] = $sortie;
        }
        return view("{$this->viewPath}::index", compact('mangas'));
    }
}
