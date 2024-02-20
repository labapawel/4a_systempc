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
    <div class="col-6">
            @include("compo.select", ["id"=>"sala", "title"=>"Sala", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
    <div class="col-6">
            @include("compo.input", ["id"=>"stanowisko", "title"=>"Stanowisko", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.select", ["id"=>"prod", "title"=>"Rodzaj sprzętu", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"sn", "title"=>"Numer seryjny", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"masra", "title"=>"Marka", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"model", "title"=>"Model", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.multiinput", ["id"=>"model", "title"=>"Model", "dane"=>\App\Models\rodzajeMa::all()])
        </div>

    </div>
    </div>


@endsection

