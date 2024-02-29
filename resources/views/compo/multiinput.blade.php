<div class="delitem"></div>
<div class="row multiinp">
<div class="col-12 mt-2">
  <span class="btn btn-success" onclick="dodaj_elem('','','')">+</span>
</div>



</div>

<script> 
  const $$ = e=>document.querySelector(e);
  const New = (e) => document.createElement(e);    
  let pola = @json($dane);
  /*
    @name
  */
   function dodaj_elem(ids, selid, val)
    {
      let col6a = New("div");
      col6a.className="col-6";
      let kont = New('div');
      kont.className="ui-widget input-group mt-2";
      let label = New("label");
      label.innerText = 'Rodzaj';
      label.className = 'input-group-text';
      let kont1 = New('div');
      kont1.className="ui-widget input-group mt-2";
      let label1 = New("label");
      label1.innerText = 'Wartość';
      label1.className = 'input-group-text';
      let sel = New('select');
      sel.name=`sel[${ids}]`;
      sel.className = 'form-select';
      let input = New('input');
      input.value = val;
      input.type='text'
      input.className="form-control";
      input.name=`wart[${ids}]`
      kont.append(label);
      kont.append(sel);
      
      kont1.append(label1);
      kont1.append(input);
      let del=New('button');
      del.className ='btn btn-danger ';
      del.innerText= '-'
      kont1.append(del);

      col6a.setAttribute('ids', ids);
      col6a.append(kont);

      let o=New('option');
      o.innerText = 'Select one...';
      sel.append(o);
      pola.forEach(p=>{
        let o = New('option');
        o.value = p.id;
        if(selid == p.id)
        {
          o.selected = true;
        }
        o.innerText = p.nazwa;
        sel.append(o);
      })

      let col6b = New("div");
      col6b.append(kont1);
            col6b.className="col-6";
      del.addEventListener('click',(e)=>{
        let idx = col6a.getAttribute('ids');
        let i = New("input");
        i.name = 'delitem[]';
        i.type='hidden';
        i.value = idx;
        col6a.remove();
        col6b.remove();
        $(".delitem").append(i);
      })      
      $$(".multiinp").append(col6a);
      $$(".multiinp").append(col6b);

    }
    let ids = '{{old('id')}}';
    let mat = [];
    @if(\App\Models\sprzet::find(old('id')))
    @foreach(\App\Models\sprzet::find(old('id'))->Material as $item)
    dodaj_elem({{$item->id}},{{$item->rodzmas_id}},'{{$item->wartosc}}');
    mat.push(@json($item));
    @endforeach
    @endif

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