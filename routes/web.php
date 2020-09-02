<?php


$mangaController = '\Bcorp\Lelframework\Http\Controllers\MangaController';
$lectureController = '\Bcorp\Lelframework\Http\Controllers\LectureController';

Route::get('/', '\Bcorp\Lelframework\Http\Controllers\HomeController@index');
Route::get('/encours', "$mangaController@encours");
Route::get('/enpause', "$mangaController@enpause");
Route::get('/termine', "$mangaController@termine");

Route::get('/lel/{manga}/{chapitre}', "$lectureController@index");

Route::get('/lel/{manga}/', "$mangaController@termine");
