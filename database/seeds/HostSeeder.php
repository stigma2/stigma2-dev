<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $hostManager = App::make('Stigma\ObjectManager\HostManager') ;


        $data = [
            'host_name' => 'generic-host',
            'is_immutable' => 'Y',
            'description' => '',
            'command_id' => '0',
            'command_argument' => '',
            'template_ids' => '',
            'service_ids' => '',
            'template_name' => 'generic-host',
            'alias' => 'generic-host',
            'is_template' => 'Y',
            'address' => '',
            'data' => '{"host_name":" generic-host","n otification_perio d":"24x7","notifi cations_enabled ":"1","retain_no nstatus_informa tion":"1","retain _status_informat ion":"1","flap_de tection_enabled ":"1","event_han dler_enabled":"1 ","process_perf_ data":"1","is_te mplate":"Y","is_i mmutable":"Y"," template_ids":"" ,"service_ids":"" }',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'linux-server',
            'is_immutable' => 'Y',
            'description' => '',
            'command_id' => '3',
            'command_argument' => '',
            'template_ids' => '1',
            'service_ids' => '',
            'template_name' => 'linux-server',
            'alias' => 'linux-server',
            'is_template' => 'Y',
            'address' => '',
            'data' => '{"host_name":"l inux-server","m ax_check_attem pts":"10","notifi cation_period":" workhours","not ification_interval ":"120","contact _groups":"admin s","notification_ options":"d","ch eck_interval":"5 ","retry_interval ":"1","check_per iod":"24x7","is_t emplate":"Y","is _immutable":"Y" ,"template_ids": "1","service_ids" :"","command_i d":"3","comman d_argument":"" }',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'windows-server',
            'is_immutable' => 'Y',
            'description' => '',
            'command_id' => '3',
            'command_argument' => '',
            'template_ids' => '1',
            'service_ids' => '',
            'template_name' => 'windows-server',
            'alias' => 'windows-server',
            'is_template' => 'Y',
            'address' => '',
            'data' => '{"host_name":" windows-server" ,"max_check_att empts":"10","no tification_period ":"24x7","notific ation_interval":" 30","contact_gr oups":"admins", "notification_opt ions":"d","check _interval":"5","r etry_interval":"1 ","hostgroups":" windows-servers ","check_period" :"24x7","is_tem plate":"Y","is_im mutable":"Y","te mplate_ids":"1", "service_ids":"", "command_id":" 3","command_a rgument":""}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'generic-printer',
            'is_immutable' => 'Y',
            'description' => '',
            'command_id' => '3',
            'command_argument' => '',
            'template_ids' => '1',
            'service_ids' => '',
            'template_name' => 'generic-printer',
            'alias' => 'generic-printer',
            'is_template' => 'Y',
            'address' => '',
            'data' => '{"host_name":"generic-printer","max_check_att empts":"10","no tification_period ":"workhours","n otification_inter val":"30","conta ct_groups":"adm ins","notification _options":"d","c heck_interval":" 5","retry_interva l":"1","check_pe riod":"24x7","is_ template":"Y","i s_immutable":"Y ","template_ids" :"1","service_ids ":"","command_i d":"3","comman d_argument":"" }',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'generic-switch',
            'is_immutable' => 'Y',
            'description' => '',
            'command_id' => '3',
            'command_argument' => '',
            'template_ids' => '1',
            'service_ids' => '',
            'template_name' => 'generic-switch',
            'alias' => 'generic-switch',
            'is_template' => 'Y',
            'address' => '',
            'data' => '{"host_name":" generic-switch", "max_check_att empts":"10","no tification_period ":"24x7","notific ation_interval":" 30","contact_gr oups":"admins", "notification_opt ions":"d","check _interval":"5","r etry_interval":"1 ","check_period" :"24x7","is_tem plate":"Y","is_im mutable":"Y","te mplate_ids":"1", "service_ids":"", "command_id":" 3","command_a rgument":""}',
        ];

        $hostManager->register($data);


    }
}
