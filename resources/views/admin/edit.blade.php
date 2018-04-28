@extends('admin.admin_template')

@section('content')
<h2>
    {{$emp->name}}
</h2>
<div class="container">
<form action="" class="table table-bordered">
    <div class="form-group">
    <input type="text" value="{{$emp->name}}" class="form-control">
    <input type="text" value="{{$emp->email}}" class="form-control">
    <input type="text" value="{{$emp->image}}" class="form-control">
    <input type="text" value="{{$emp->National_ID }}" class="form-control">
    </div>
    <div class="form-group">
        <a href="/employee/{{$emp->id}}/update"><button class="btn btn-primary btn-flat">Update</button></a>
    </div>
</form>
</div>

    @endsection