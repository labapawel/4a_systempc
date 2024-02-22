<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('chprod');
});


Route::post('/', function () {
    $inp = \Request::all();
    // dd($inp);

    $mod = \App\Models\sprzet::firstOrCreate(["serialno"=>$inp['serialno']]);
    $mod->rodz_id = $inp['rodz_id']; 
    $mod->model = $inp['model']; 
    $mod->salaid = $inp['salaid']; 
    $mod->stanowisko = $inp['stanowisko']; 
    $mod->marka = $inp['marka'];
    $mod->save(); 

    return redirect()->back()->withInput()->with('success', 'Wiadomość została pomyślnie wysłana!');
});
