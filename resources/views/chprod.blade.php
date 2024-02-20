@extends('app')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">PTI</h4>
            </div>
        </div>
    </div>
    
@section('main')
    <div class="container">
    <div class="row">
        <div class="col-12">
            @include("compo.select", ["id"=>"prod", "title"=>"Rodzaj sprzętu", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"prod1", "title"=>"Numer seryjny", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
    </div>
    </div>


@endsection

