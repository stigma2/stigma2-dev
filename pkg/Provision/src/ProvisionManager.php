<?php
namespace Stigma\Provision ;
use Aws\Ec2\Ec2Client;

class ProvisionManager
{
    public function provisionNagiosEnv(array $data)
    { 
        
        $ec2Client = Ec2Client::factory(array(
            'key'    => $data['key'] ,
            'secret' => $data['secret'] ,
            'region' => $data['region'] // (e.g., us-east-1)
        )); 
 

        $keyPairName = "hellostigma".rand();
        $result = $ec2Client->createKeyPair(array(
            'KeyName' => $keyPairName
        )); 

        $saveKeyLocation = getenv('HOME'). "/.ssh/{$keyPairName}.pem" ;

        file_put_contents($saveKeyLocation , $result['keyMaterial']) ;

        chmod($saveKeyLocation ,0600) ;

        $securityGroupName = 'my-security-group20';
        $result = $ec2Client->createSecurityGroup(array(
            'GroupName'   => $securityGroupName,
            'Description' => 'Basic web server security'
        ));

        // Get the security group ID (optional)
        // $securityGroupId = $result->get('GroupId');
        //
        //

        $ec2Client->authorizeSecurityGroupIngress(array(
            'GroupName'     => $securityGroupName,
            'IpPermissions' => array(
                array(
                    'IpProtocol' => 'tcp',
                    'FromPort'   => 80,
                    'ToPort'     => 80,
                    'IpRanges'   => array(
                        array('CidrIp' => '0.0.0.0/0')
                    ),
                ),
                array(
                    'IpProtocol' => 'tcp',
                    'FromPort'   => 22,
                    'ToPort'     => 22,
                    'IpRanges'   => array(
                        array('CidrIp' => '0.0.0.0/0')
                    ),
                )
            )
        )); 

        $result = $ec2Client->runInstances(array(
            'ImageId'        => 'ami-9e95f79e',
            'MinCount'       => 1,
            'MaxCount'       => 1,
            'InstanceType'   => 'm3.medium',
            'KeyName'        => $keyPairName,
            'SecurityGroups' => array($securityGroupName),
        ));

        $instanceIds = $result->getPath('Instances/*/InstanceId');

        $ec2Client->waitUntilInstanceRunning(array(
            'InstanceIds' => $instanceIds,
        ));

        $result = $ec2Client->describeInstances(array(
            'InstanceIds' => $instanceIds,
        ));

        (current($result->getPath('Reservations/*/Instances/*/PublicDnsName')));
    }
}
