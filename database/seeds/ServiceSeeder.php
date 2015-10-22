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


    }
}
