@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Configuration</a></li>
  <li class="current"><a href="#">Nagios</a></li>
</ul>


{!! Form::open(array('route'=> array('admin.configuration.nagios.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Nagios Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host' ) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

{!! Form::open(array('route'=> array('admin.configuration.nagios.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Influxdb Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host' ) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

{!! Form::open(array('route'=> array('admin.configuration.nagios.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Influxdb Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host' ) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}



@stop
