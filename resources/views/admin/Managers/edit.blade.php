@extends('admin.admin_template')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Manager</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Managers.index') }}"> Back</a>
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
    {!! Form::model($manager, ['method' => 'PATCH','route' => ['Managers.update', $manager->id]]) !!}
    @include('admin.Managers.form')
    {!! Form::close() !!}
@endsection