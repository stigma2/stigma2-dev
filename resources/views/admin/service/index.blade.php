@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">SERVICE Manager</a></li>
  <li class="current"><a href="#">List</a></li>
</ul>

<div class="inner-content">

    <a href="{{route('admin.services.create')}}" class="button small right" >Create</a>

    <table class="table">
        <thead>
            <tr>
                <th width="50">#</th>
                <th width="200">Service Name</th>
                <th>Host Addr</th>
                <th>Used Template</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div> 

@stop
