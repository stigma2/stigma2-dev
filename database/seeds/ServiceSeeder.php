<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $serviceManager = App::make('Stigma\ObjectManager\ServiceManager') ;


        $data = [
            'service_name' => 'generic-service',
            'command_id' => '0',
            'is_immutable' => 'Y',
            'command_argument' => '',
            'service_description' => 'generic-service',
            'template_ids' => '',
            'is_template' => 'Y',
            'data' => '{"cont act_gr oups": "admi ns","c heck_i nterval ":"10", "check _perio d":"24 x7","n otificat ion_int erval": "60"," notific ation_ period ":"24x 7","ma x_chec k_atte mpts": "3","re try_int erval": "2","n otificat ion_op tions": "w","r etain_ nonsta tus_inf ormati on":"1 ","reta in_stat us_info rmatio n":"1", "notifi cation s_enab led":"1 ","proc ess_pe rf_data ":"1"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"1", "passi ve_che cks_en abled" :"1","o bsess_ over_service| obsess ":"1","f lap_de tection _enabl ed":"1 ","eve nt_han dler_e nabled ":"1"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"ge neric-s ervice" }',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'local-service',
            'command_id' => '0',
            'is_immutable' => 'Y',
            'command_argument' => '',
            'service_description' => 'local-service',
            'template_ids' => '1',
            'is_template' => 'Y',
            'data' => '{"chec k_inter val":"5 ","max _check _attem pts":"4 ","retr y_inter val":"1 ","notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatile":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"loc al-serv ice","t emplat e_ids": "1"}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'PING',
            'command_id' => '16',
            'is_immutable' => 'Y',
            'command_argument' => '!100.0,20%!500.0,60%',
            'service_description' => 'PING',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enabled":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"PIN G","te mplate _ids":" 2","co mman d_id":" 16","c omma nd_arg ument ":"!10 0.0,20 %!500 .0,60% "}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'Root Partition',
            'command_id' => '4',
            'is_immutable' => 'Y',
            'command_argument' => '!20%!10%!/',
            'service_description' => 'Root Partition',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabled":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"Ro ot Part ition"," templa te_ids" :"2","c omma nd_id": "4","co mman d_argu ment": "!20%! 10%!\/ "}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'Current Users',
            'command_id' => '7',
            'is_immutable' => 'Y',
            'command_argument' => '!20!50',
            'service_description' => 'Current Users',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication_optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"Current U sers"," templa te_ids" :"2","c omma nd_id": "7","co mman d_argu ment": "!20!5 0"}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'Total Processes',
            'command_id' => '6',
            'is_immutable' => 'Y',
            'command_argument' => '!250!400!RSZDT',
            'service_description' => 'Total Processes',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshness":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"Tot al Proc esses" ,"temp late_id s":"2", "com mand_ id":"6" ,"com mand_ argum ent":"! 250!4 00!RS ZDT"}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'Current Load',
            'command_id' => '5',
            'is_immutable' => 'Y',
            'command_argument' => '!5.0,4.0,3.0!10.0,6.0,4.0',
            'service_description' => 'Current Load',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled":"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"Cu rrent L oad","t emplat e_ids": "2","co mman d_id":" 5","co mman d_argu ment": "!5.0,4 .0,3.0! 10.0,6. 0,4.0" }',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'Swap Usage',
            'command_id' => '8',
            'is_immutable' => 'Y',
            'command_argument' => '!20!10',
            'service_description' => 'Swap Usage',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"0 ","proc ess_pe rf_data":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"Sw ap Usa ge","te mplate _ids":" 2","co mman d_id":" 8","co mman d_argu ment": "!20!1 0"}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'SSH',
            'command_id' => '14',
            'is_immutable' => 'Y',
            'command_argument' => '',
            'service_description' => 'SSH',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status_infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"1 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_te mplate ":"Y","i s_imm utable ":"Y"," servic e_nam e":"SS H","te mplate _ids":" 2","co mmand_id":" 14","c omma nd_arg ument ":""}',
        ];

        $serviceManager->register($data);


        $data = [
            'service_name' => 'HTTP',
            'command_id' => '13',
            'is_immutable' => 'Y',
            'command_argument' => '',
            'service_description' => 'HTTP',
            'template_ids' => '2',
            'is_template' => 'Y',
            'data' => '{"notif ication _optio ns":"w ","reta in_non status _infor mation ":"0"," retain_ status _infor mation ":"0"," notific ations _enabl ed":"1 ","proc ess_pe rf_data ":"0"," stalkin g_opti ons":" o","is_ volatil e":"0", "initial _state" :"o","a ctive_c hecks_ enable d":"0", "passi ve_che cks_en abled" :"0","o bsess_ over_s ervice| obsess ":"0","f lap_de tection _enabl ed":"0 ","eve nt_han dler_e nabled ":"0"," check_ freshn ess":" 0","fla p_dete ction_ option s":"o", "is_template ":"Y","i s_imm utable ":"Y"," servic e_nam e":"HT TP","te mplate _ids":" 2","co mman d_id":" 13","c omma nd_arg ument ":""}',
        ];

        $serviceManager->register($data);


    }
}
