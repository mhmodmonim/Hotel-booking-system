
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Number</label>
            {!! Form::number('number', rand(1000, 9999), array('placeholder' => 'Number' ,'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>capacity</label>
            {!! Form::number('capacity', null, array('placeholder' => 'capacity','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>price</label>
           <input type='number' name='price' value="" class='form-control'>
           <input type='hidden' name='employee_id' value="{{Auth::guard('employee')->user()->id}}" >
        </div>

    </div>
    
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Floor Name:</label   >
            <select class='form-control' name='floor_id'>
                @if($floors)
                    @foreach($floors as $floor)
                    <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                    @endforeach
                @else
                    No Floors 
                @endif
            </select> 
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>