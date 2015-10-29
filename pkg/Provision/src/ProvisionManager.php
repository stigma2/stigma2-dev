<?php
namespace Stigma\Provision ;
use Aws\Ec2\Ec2Client;
use Stigma\Installation\Generators\ProvisioningFileGenerator ;
use Stigma\Provision\Repositories\ProvisionedServerRepository ;
use Stigma\Installation\InstallManager;

class ProvisionManager
{
    protected $fileGenerator ;
    protected $installManager ;
    protected $provisionedServerRepo ;

    public function __construct(ProvisioningFileGenerator $fileGenerator, ProvisionedServerRepository $provisionedServerRepo , InstallManager $installManager)
    {
        $this->fileGenerator = $fileGenerator ;
        $this->provisionedServerRepo = $provisionedServerRepo ;
        $this->installManager = $installManager ;
    }

    public function provisionNagiosEnv(array $data)
    { 
        $ec2Client = Ec2Client::factory(array(
            'key'    => $data['apikey'] ,
            'secret' => $data['secret'] ,
            'region' => 'us-east-1' // (e.g., us-east-1)
        )); 
 

        $keyPairName = "hellostigma".rand();
        $result = $ec2Client->createKeyPair(array(
            'KeyName' => $keyPairName
        )); 

        //$saveKeyLocation = getenv('HOME'). "/.ssh/{$keyPairName}.pem" ;
        $saveKeyLocation = getenv('HOME'). "/app-root/data/{$keyPairName}.pem" ;

        file_put_contents($saveKeyLocation , $result['keyMaterial']) ;

        chmod($saveKeyLocation ,0600) ;

        $securityGroupName = 'my-security-group'.rand();
        $result = $ec2Client->createSecurityGroup(array(
            'GroupName'   => $securityGroupName,
            'Description' => 'Basic web server security'
        ));

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
                    'FromPort'   => 3000,
                    'ToPort'     => 3000,
                    'IpRanges'   => array(
                        array('CidrIp' => '0.0.0.0/0')
                    ),
                ),
                array(
                    'IpProtocol' => 'tcp',
                    'FromPort'   => 8083,
                    'ToPort'     => 8083,
                    'IpRanges'   => array(
                        array('CidrIp' => '0.0.0.0/0')
                    ),
                ),
                array(
                    'IpProtocol' => 'tcp',
                    'FromPort'   => 8086,
                    'ToPort'     => 8086,
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
            //'ImageId'        => 'ami-03486d6d',
            'ImageId'        => 'ami-1b4f3f71',
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

        $publicDns = (current($result->getPath('Reservations/*/Instances/*/PublicDnsName')));
        //$securityGroupName = ''; 
        $data = array(
            'public_dns' => $publicDns ,
            'security_group' => $securityGroupName
        );
        $this->provisionedServerRepo->store($data) ;

        $nagiosInstallation = $this->installManager->getNagiosInstallation() ;
        $nagiosInstallation->setup(array('host'=>'http://'.$publicDns.'/nagios-dev/'))  ;

        $grafanaInstallation = $this->installManager->getGrafanaInstallation() ;
        $grafanaInstallation->setup(array(
            'host'=>'http://'.$publicDns.':3000',
            'username'=> 'admin' , 
            'password'=> 'admin' , 
        ));

        $influxdbInstallation = $this->installManager->getInfluxdbInstallation() ;
        $influxdbInstallation->setup(array(
            'host'=>'http://'.$publicDns.':8086',
            'database'=> 'stigma' , 
            'username'=> 'root' , 
            'password'=> 'root' , 
        )); 
    }

    public function setup($data)
    {
        $this->fileGenerator->make($data) ;
    }
}
