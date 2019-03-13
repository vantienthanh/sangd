
<div class="box-body">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
    <label for="location">Localtion</label>
    <select name="location" id="location" class="form-control">
        @foreach($location as $item)
            <option value="{{$item}}">{{$item}}</option>
        @endforeach
    </select>
    <label for="">Start time</label>
</div>
