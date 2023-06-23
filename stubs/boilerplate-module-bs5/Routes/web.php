<?php
use Illuminate\Support\Facades\Route;
use Modules\{Module}\Http\Controllers\{Module}Controller;


Route::name('module.')->group(function(){
    Route::resource('{modules}',{Module}Controller::class);
});

