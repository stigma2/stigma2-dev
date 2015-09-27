@extends('layouts.installation')

@section('contents') 
{!!Form::open(array('route' => 'installation::database.install' ,'method' => 'post')) !!} 
    <div class="form-group">
        <label>Host</label>
        {!!Form::text('host')!!}
    </div>

    <div class="form-group">
        <label>Port</label>
        {!!Form::text('port')!!}
    </div>


    <div class="form-group">
        <label>Username</label>
        {!!Form::text('username')!!}
    </div>

    <div class="form-group">
        <label>Password</label>
        {!!Form::text('password')!!}
    </div>

    {!!Form::submit('SAVE', array('class' =>'button', 'id' => 'next-btn' ))!!}
{!!Form::close() !!}
@stop
