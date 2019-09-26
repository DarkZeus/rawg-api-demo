<?php

Route::get('/', function () {
    return redirect('/games');
});

Route::get('/games', 'GameController@index');
Route::get('/games/{game}', 'GameController@show');
