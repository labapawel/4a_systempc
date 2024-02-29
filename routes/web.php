<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController ;
use App\Http\Controllers\Auth\ResetPasswordController ;

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

Route::get("/test", function(){
    dd(\App\Models\sprzet::find(1)->Material[0]->Opis);
});

Route::get('/', function () {
    return view('start');
});
Route::get('/dodaj', function () {

    return view('chprod');
});

Route::get('/serial/{sn}', function ($sn) {
    $dane = \App\Models\sprzet::where('serialno', $sn)->orWhere('qr', $sn)->first();
    
    if(!$dane)
     {
        $dane['qr']=$sn;
        $dane['serialno']=$sn;
     } else $dane = $dane->toArray(); 
    return redirect()->to("/dodaj")->withInput($dane);
});

Route::post('/szukaj', function () {
    $inp = \Request::all();
    if(empty($inp['szukaj']))
        return redirect()->back();

    if($inp['typ']=="serialn")
        return redirect()->to("/serial/{$inp['szukaj']}");
    dd($inp);
});

Route::post('/dodaj', function () {
    $inp = \Request::all();
    // dd($inp);

    $validator = Validator::make($inp, [
        'rodz_id' => 'required|numeric',
        'salaid' => 'required|numeric',
        'serialno' => 'required|string|min:6',
    ]);

    // Jeśli walidacja nie powiedzie się, zwróć odpowiedź z błędami
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

//    dd($inp);

    $mod = \App\Models\sprzet::firstOrCreate(["rodz_id"=>$inp['rodz_id'], "salaid"=>$inp['salaid'], "serialno"=>$inp['serialno']]);
    // $mod->rodz_id = $inp['rodz_id']; 
    $mod->model = $inp['model']; 
    $mod->qr = $inp['qr']; 
    // $mod->salaid = $inp['salaid']; 
    $mod->stanowisko = $inp['stanowisko']; 
    $mod->marka = $inp['marka'];
    $mod->save(); 

    if(isset($inp['delitem']) && count($inp['delitem']))
    {
        foreach($inp['delitem'] as $item)
        \App\Models\materialWartosc::find($item)->delete();
    }
    if(isset($inp['sel']) && count($inp['sel']))
    foreach($inp['sel'] as $key=>$item)
    {
        if(isset($inp['wart'][$key]) && !empty($inp['wart'][$key]))
        $el = \App\Models\materialWartosc::firstOrCreate(['sprz_id'=>$mod->getKey(), 'rodzmas_id'=>$item]);
        $el->wartosc = $inp['wart'][$key];
        $el->save();
    }

    $dane = $mod->toArray();
    return redirect()->back()->withInput($dane)->with('success', 'Wiadomość została pomyślnie wysłana!');
});

// Trasa dla wyświetlania formularza logowania
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
// Trasa do przetwarzania logowania
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
// Trasa do wylogowywania
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


// Trasa dla wyświetlania formularza resetowania hasła
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Trasa do przetwarzania resetowania hasła
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Trasa dla formularza resetowania hasła
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Trasa do przetwarzania resetowania hasła
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
