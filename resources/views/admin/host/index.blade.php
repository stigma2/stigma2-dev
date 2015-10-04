@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Host Manager</a></li>
  <li class="current"><a href="#">List</a></li>
</ul>

<div class="inner-content">

    <a href="{{route('admin.hosts.create')}}" class="button small right" >Create</a>

    <table class="table">
        <thead>
            <tr>
                <th width="50">#</th>
                <th width="200">Host Name</th>
                <th>For Template</th>
                <th width="50"></th>
                <th width="50"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->getKey()}}</td>
                <td>{{$item->host_name}}</td>
                <td>{{$item->is_template}}</td>
                <td style="text-align:center;"><a class="update-btn" href="{{route('admin.hosts.edit',array($item->getKey()))}}"><i class="fi-widget"></i></a></td>
                <td style="text-align:center;"><a class="delete-btn alert"><i class="fi-trash"></i></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div> 

@stop
