@extends('app')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">PTI UTK</h4>
            </div>
        </div>
    </div>
    @endsection   
@section('main')
    <form  method="post" action="szukaj">
    @csrf

        <div class="container">
            <div class="row">
                <div class="col-12">
                <!-- <div class="form-check">
                    <input type="radio"  class="form-check-input" name="typ" value="qr" id="qr" checked><label  class="form-check-label"  for="qr">Kod QR</label>
</div> -->
                    <div class="form-check">
                    <input type="radio" checked class="form-check-input" name="typ" value="serialn" id="serialn"><label  class="form-check-label"  for="serialn" >Numer seryjny</label>
                </div>
                </div>
            <div class="col-12">
                @include("compo.inputscan", ["id"=>"szukaj", "title"=>"Szukaj", "dane"=>\App\Models\rodzajeSp::all()])
            </div>
            <div class="col-12">
                <input type="submit" class="mt-3 btn btn-success" value="Szukaj">
            </div>
            </div>
        </div>
    </form>

@endsection

