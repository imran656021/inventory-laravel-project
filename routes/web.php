<?php

Route::get('/', function () {
    return view('dashboard');
});
// Route::get('admin', function(){
//     return view('dashboard');
// });
Route::get('/{vue_capture?}', function(){
    return view ('dashboard');

})->where('vue_capture', '[\/\w\.-]*');
