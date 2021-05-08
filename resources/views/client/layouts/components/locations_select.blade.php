<div class="form_item">
    <select name="{{$name}}">
        <option value='' selected data-display="Choose Location">Select A Option</option>
        @foreach($locations as $location)
            <option value="{{$location->id}}" {{old($name)==$location->id?'selected':''}}>{{$location->name}}</option>
        @endforeach
    </select>
</div>
