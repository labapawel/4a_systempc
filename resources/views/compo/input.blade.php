<div class="ui-widget input-group mt-2">
  <label for="{{$id}}" class="input-group-text">{{$title}}</label>
  <input id="{{$id}}" class="form-control">
</div>

<script>
  $( function() {
 
    $( "#{{$id}}" ).autocomplete({
      source: "search.php",
      minLength: 2,
      select: function( event, ui ) {
        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  } );
  </script>