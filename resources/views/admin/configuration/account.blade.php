@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Configuration</a></li>
  <li class="current"><a href="#">Account</a></li>
</ul>


{!! Form::open(array('route'=> array('admin.configuration.changePassword'),'method' =>'post','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Password Change</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Password</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Password Confirm</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password_confirm'  ) !!}
            </div>
        </div> 
    </div>
</div>
{!! Form::close() !!}

@stop
