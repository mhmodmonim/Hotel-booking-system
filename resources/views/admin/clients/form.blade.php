
 <?php $name = Route::currentRouteName(); ?>
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label class='form-label'>Name</label>
            {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
        </div>
    </div>
 
    @if($name=='clients.create')
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class='form-control' placeholder="Password" 
             name='password' value="<?=  (isset($user->password)?$user->password:'')?>">
        </div>
    </div>
    @endif
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label class='form-label'>Image</label>
            <div class='form-control'>
                <input type="file" name="image" >
            </div>
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
            <label>Mobile Phone:</label   >
            {!! Form::text('mobile', null, array('placeholder' => 'mobile','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
        <label>Gender:</label></br>
            {{Form::label('male')}}            
            {{ Form::radio('gender', 'male' , array('class' => 'form-control')) }}<br>
            {{Form::label('female')}}     
            {{ Form::radio('gender', 'female' ,array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Country:</label   >
            <select   class="form-control {{$errors->has('country') ? ' is-invalid' : '' }}" name="country" >
                @foreach($countries as $country)
                    <option >{{ $country['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>


    

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>