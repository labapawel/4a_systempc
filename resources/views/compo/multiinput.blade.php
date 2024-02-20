<div class="row">
<div class="col-12 mt-2">
  <span class="btn btn-success">+</span>
</div>

<div class="col-6">
<div class="input-group  mt-2">
                <label for="{{$id}}b" class="input-group-text">Rodzaj</label>
                <select id="{{$id}}b" class="form-select">
                    <option value>Select one...</option>
        @foreach($dane as $pole)                    
                    <option value="{{$pole->id}}">{{$pole->nazwa}}</option>
        @endforeach            
                </select>
</div>
</div>

<div class="col-6">
          <div class="ui-widget input-group mt-2">
            <label for="{{$id}}a" class="input-group-text">Wartość</label>
            <input id="{{$id}}a" @isset($name)name="{{$name}}"@endisset @isset($value)value="{{$value}}"@endisset  class="form-control">
            <button class="btn btn-danger " type="button" id="inputGroupFileAddon04">-</button>
          </div>
</div>


</div>

<script>
  $( function() {
 
    $( "#{{$id}}a" ).autocomplete({
      source: "search.php",
      minLength: 2,
      select: function( event, ui ) {
        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  } );
  </script>