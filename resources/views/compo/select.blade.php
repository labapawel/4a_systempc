<div class="ui-widget input-group  mt-2">
                <label for="{{$id}}" class="input-group-text">{{$title}}</label>
                <select id="{{$id}}" name="{{$id}}" class="form-select">
                    <option value>Jedno z..</option>
        @foreach($dane as $pole)                    
                    <option value="{{$pole->id}}" @if(old($id)==$pole->id) selected @endif>{{$pole->nazwa}}</option>
        @endforeach            
                </select>
</div>


