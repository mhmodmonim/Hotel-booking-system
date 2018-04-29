@extends('admin.admin_template')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Receptionist</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Receptionists.index') }}"> Back</a>
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


    {!! Form::model($Recept, ['method' => 'PATCH','route' => ['Receptionists.update', $Recept->id] , 'files' => true ]) !!}
        @include('admin.Receptionists.form')
    {!! Form::close() !!}


@endsection