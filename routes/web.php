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

Route::get('/', function () {
    return view('chprod');
});

Route::get('/serial/{sn}', function ($sn) {
    $dane = \App\Models\sprzet::where('serialno', $sn)->first();
    
    if(!$dane)
     {
        $dane['serialno']=$sn;
     } else $dane = $dane->toArray(); 
    return redirect()->to("/")->withInput($dane);
});


Route::post('/', function () {
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

    $mod = \App\Models\sprzet::firstOrCreate(["rodz_id"=>$inp['rodz_id'], "salaid"=>$inp['salaid'], "serialno"=>$inp['serialno']]);
    // $mod->rodz_id = $inp['rodz_id']; 
    $mod->model = $inp['model']; 
    // $mod->salaid = $inp['salaid']; 
    $mod->stanowisko = $inp['stanowisko']; 
    $mod->marka = $inp['marka'];
    $mod->save(); 

    return redirect()->back()->withInput()->with('success', 'Wiadomość została pomyślnie wysłana!');
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
