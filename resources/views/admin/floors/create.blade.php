@extends('admin.admin_template')
@section('content')
<div class="content-wrapper">
    <div class="row">
            <div class="col-lg-8 ">
                <div class="pull-left">
                    <h2>Add Floor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href=""> Back</a>
                </div>
            </div>
    </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

    

        {!! Form::open(array('method'=>'POST' , 'route' => 'floors.store')) !!}
            @include('admin.floors.form')
        {!! Form::close() !!}

    </div>
@endsection