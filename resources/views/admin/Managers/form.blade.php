<?php $name = Route::currentRouteName(); ?>
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Name</label>
            {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Email</label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    @if($name=='Managers.create')
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class='form-control' placeholder="Password" 
             name='password' value="<?=  (isset($manager->password)?$manager->password:'')?>">
        </div>
    </div>
    @endif
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
                <label>Image</label>
                {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control')) !!}
           
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <label>National ID</label>
            {!! Form::text('National_ID', null, array('placeholder' => 'National ID','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>