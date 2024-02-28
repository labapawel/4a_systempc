@extends('app')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">PTI UTK</h4>
            </div>
        </div>
    </div>
    
@section('main')
<form  method="post">
    @csrf

    <div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/dodaj" class="btn btn-info">Nowy</a>
        </div>
        <div class="col-6">
            @include("compo.select", ["id"=>"salaid", "title"=>"Sala", "dane"=>\App\Models\sale::orderBy('numer','asc')->get()])
        </div>
        <div class="col-6">
            @include("compo.input", ["id"=>"stanowisko", "title"=>"Stanowisko", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.select", ["id"=>"rodz_id", "title"=>"Rodzaj sprzętu", "dane"=>\App\Models\rodzajeSp::orderBy('nazwa','asc')->get()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"serialno", "title"=>"Numer seryjny", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"marka", "title"=>"Marka", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.input", ["id"=>"model", "title"=>"Model", "dane"=>\App\Models\rodzajeSp::all()])
        </div>
        <div class="col-12">
            @include("compo.multiinput", ["id"=>"model", "title"=>"Model", "dane"=>\App\Models\rodzajeMa::all()])
        </div>

        <div class="col-12">
            <input type="submit" class="btn btn-success mt-3" value="Zapisz">
            <input type="button"  class="btn btn-info nowy  mt-3" value="nowy">
        </div>
        <script>
            document.querySelector(".nowy").addEventListener("click", ()=>{
                window.location = "/";
            });
        </script>
    </div>
    </div>
    </form>

@endsection

