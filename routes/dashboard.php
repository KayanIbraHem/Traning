<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Term\TermController;

//TERMS
Route::controller(TermController::class)->group(function () {
    Route::post('store_term', 'store');
    Route::get('terms', 'index');
    Route::get('show_term/{term}', 'show');
    Route::post('update_term/{term}', 'update');
    Route::delete('delete_term/{term}', 'delete');
});
