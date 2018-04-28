<div class="row">
    
    
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Name</label>
            {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Password:</label>
            {!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Email:</label   >
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
     
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Country:</label   >
            <select class='form-control' name='country'>
                 <option value="Egypt">Egypt</option>
            </select> 
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>avatar_image:</label   >
            {!! Form::file('image', null, array('placeholder' => 'avatar_image','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>National ID:</label   >
            {!! Form::text('National_ID', null, array('placeholder' => 'National ID','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            {{Form::label('male')}}            
            {{ Form::radio('Gender', 'male' , array('class' => 'form-control')) }}<br>
            {{Form::label('female')}}     
            {{ Form::radio('Gender', 'female' ,array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>