<div class="panel white-panel  radius">
    <h5>PROVISIONED SERVER LIST</h5> 
    <table class="table">
            <thead>
            <tr>
                <th width="50">ID</th>
                <th>Public DNS</th>
                <th>Security Group</th>
            </tr>
            </thead>
            <tbody>
            @foreach($serverList as $server)
            <tr>
                <td>{{$server->getKey()}}</td>
                <td>http://{{$server->public_dns}}</td>
                <td>{{$server->security_group}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

</div>
 
