<?php

require 'vendor/autoload.php';

use App\Interfaces\HostsInterface;
use App\Interfaces\HostDetailsInterface;
use App\Interfaces\ObjectsInterface;

use Illuminate\Database\Seeder;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class HostTableSeeder extends Seeder
{
    private $hostsRepository;
    private $hostDetailsRepository;
    private $objectsRepository;

    /**
     * Set the dependencies.
     *
     * @param HostsInterface $hostsRepository
     * @param HostDetailsInterface $hostDetailsRepository
     * @param ObjectsInterface $objectsRepository
     * @return void
     */
    public function __construct(HostsInterface $hostsRepository, HostDetailsInterface $hostDetailsRepository, ObjectsInterface $objectsRepository)
    {
        $this->hostsRepository = $hostsRepository;
        $this->hostDetailsRepository = $hostDetailsRepository;
        $this->objectsRepository = $objectsRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::transaction(function () {
                $this->hostsRepository->removeAll();
                $this->hostDetailsRepository->removeAll();

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'generic-host',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Generic Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'generic-host'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notifications_enabled',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'event_handler_enabled',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'flap_detection_enabled',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'failure_prediction_enabled',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'process_perf_data',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retain_status_information',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retain_nonstatus_information',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'linux-server',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Linux Server Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'linux-server'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'generic-host'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_interval',
                    'value' => '5'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retry_interval',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'max_check_attempts',
                    'value' => '10'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_command',
                    'value' => 'check-host-alive'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_period',
                    'value' => 'workhours'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_interval',
                    'value' => '120'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_options',
                    'value' => 'd,u,r'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'contact_groups',
                    'value' => 'admins'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'windows-server',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Windows Server Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'windows-server'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'generic-host'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_interval',
                    'value' => '5'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retry_interval',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'max_check_attempts',
                    'value' => '10'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_command',
                    'value' => 'check-host-alive'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_interval',
                    'value' => '30'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_options',
                    'value' => 'd,r'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'contact_groups',
                    'value' => 'admins'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'hostgroups',
                    'value' => 'windows-servers'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'generic-printer',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Generic Printer Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'generic-printer'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'generic-host'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_interval',
                    'value' => '5'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retry_interval',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'max_check_attempts',
                    'value' => '10'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_command',
                    'value' => 'check-host-alive'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_period',
                    'value' => 'workhours'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_interval',
                    'value' => '30'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_options',
                    'value' => 'd,r'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'contact_groups',
                    'value' => 'admins'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'statusmap_image',
                    'value' => 'printer.png'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'generic-switch',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Generic Switch Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'generic-switch'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'generic-host'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_interval',
                    'value' => '5'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'retry_interval',
                    'value' => '1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'max_check_attempts',
                    'value' => '10'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'check_command',
                    'value' => 'check-host-alive'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_period',
                    'value' => '24x7'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_interval',
                    'value' => '30'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'notification_options',
                    'value' => 'd,r'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'contact_groups',
                    'value' => 'admins'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'statusmap_image',
                    'value' => 'switch.png'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'generic-router',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Generic Router Template',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'generic-router'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'generic-switch'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'statusmap_image',
                    'value' => 'router.png'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'register',
                    'value' => '0'
                ]);

                $uuid4 = Uuid::uuid4();
                $uuid = $uuid4->toString();
                $this->objectsRepository->save([
                    'uuid' => $uuid,
                    'object_type' => '1',
                    'first_name' => 'localhost',
                    'second_name' => '',
                    'is_active' => '1'
                ]);
                $this->hostsRepository->save([
                    'object_uuid' => $uuid,
                    'description' => 'Localhost',
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'name',
                    'value' => 'localhost'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'use',
                    'value' => 'linux-server'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'host_name',
                    'value' => 'localhost'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'alias',
                    'value' => 'localhost'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => 'address',
                    'value' => '127.0.0.1'
                ]);
                $this->hostDetailsRepository->save([
                    'host_fk' => $uuid,
                    'key' => '_graphiteprefix',
                    'value' => 'monitoring.nagios'
                ]);
            });
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}
