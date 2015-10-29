@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Dashboard</a></li>
</ul>

<div class="inner-content">
    <div class="row">
        <div class="small-3 columns"> 
            <div>
                <div>
                    NAGIOS
                </div>
            </div>
        </div>

        <div class="small-3 columns">
            <div>
                <div>
                    INFLUXDB
                </div>
            </div> 
        </div>

        <div class="small-3 columns">
            <div>
                <div>
                    GRAFANA
                </div>
            </div>
        </div>

        <div class="small-3 columns">
            <div>
                <div>
                    MYSQL
                </div>
            </div>
        </div>
    </div>
</div>
@stop
