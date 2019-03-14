<div class="box-body">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
    <label for="location">Localtion</label>
    <select name="location" id="location" class="form-control">
        @foreach($location as $item)
            <option value="{{$item}}">{{$item}}</option>
        @endforeach
    </select>
    <label for="startTime">Start time</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" name="startTime"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <label for="endTime">End time</label>
    <div class='input-group date' id='datetimepicker3'>
        <input type='text' class="form-control" name="endTime"/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
