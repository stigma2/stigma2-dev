<?php

namespace Shlee\Utils;

class NagiosConfiguration
{
    private $host = [
        array("required" => "Y", "name" => "host_name", "placeholder" => ""),
        array("required" => "Y", "name" => "alias", "placeholder" => ""),
        array("required" => "Y", "name" => "address", "placeholder" => ""),
        array("required" => "Y", "name" => "max_check_attempts", "placeholder" => "#"),
        array("required" => "Y", "name" => "check_period", "placeholder" => ""),
        array("required" => "Y", "name" => "contacts", "placeholder" => ""),
        array("required" => "Y", "name" => "contact_groups", "placeholder" => ""),
        array("required" => "Y", "name" => "notification_interval", "placeholder" => "#"),
        array("required" => "Y", "name" => "notification_period", "placeholder" => ""),
        array("required" => "Y", "name" => "_graphiteprefix", "placeholder" => ""),
        array("required" => "N", "name" => "name", "placeholder" => ""),
        array("required" => "N", "name" => "use", "placeholder" => ""),
        array("required" => "N", "name" => "display_name", "placeholder" => ""),
        array("required" => "N", "name" => "parents", "placeholder" => ""),
        // array("required" => "N", "name" => "hostgroups", "placeholder" => ""),
        array("required" => "N", "name" => "check_command", "placeholder" => ""),
        array("required" => "N", "name" => "initial_state", "placeholder" => "[o,d,u]"),
        array("required" => "N", "name" => "check_interval", "placeholder" => "#"),
        array("required" => "N", "name" => "retry_interval", "placeholder" => "#"),
        array("required" => "N", "name" => "active_checks_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "passive_checks_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "obsess_over_host", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "check_freshness", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "freshness_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "event_handler", "placeholder" => ""),
        array("required" => "N", "name" => "event_handler_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "low_flap_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "high_flap_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "failure_prediction_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "flap_detection_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "flap_detection_options", "placeholder" => "[o,d,u]"),
        array("required" => "N", "name" => "process_perf_data", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "retain_status_information", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "retain_nonstatus_information", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "first_notification_delay", "placeholder" => "#"),
        array("required" => "N", "name" => "notification_options", "placeholder" => "[d,u,r,f,s]"),
        array("required" => "N", "name" => "notifications_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "stalking_options", "placeholder" => "[o,d,u]"),
        array("required" => "N", "name" => "notes", "placeholder" => ""),
        array("required" => "N", "name" => "notes_url", "placeholder" => ""),
        array("required" => "N", "name" => "action_url", "placeholder" => ""),
        array("required" => "N", "name" => "icon_image", "placeholder" => ""),
        array("required" => "N", "name" => "icon_image_alt", "placeholder" => ""),
        array("required" => "N", "name" => "vrml_image", "placeholder" => ""),
        array("required" => "N", "name" => "statusmap_image", "placeholder" => ""),
        array("required" => "N", "name" => "2d_coords", "placeholder" => "x_coord,y_coord"),
        array("required" => "N", "name" => "3d_coords", "placeholder" => "x_coord,y_coord,z_coord")
    ];

    private $service = [
        array("required" => "Y", "name" => "host_name", "placeholder" => ""),
        array("required" => "Y", "name" => "description", "placeholder" => ""),
        array("required" => "Y", "name" => "check_command", "placeholder" => ""),
        array("required" => "Y", "name" => "max_check_attempts", "placeholder" => "#"),
        array("required" => "Y", "name" => "check_interval", "placeholder" => "#"),
        array("required" => "Y", "name" => "retry_interval", "placeholder" => "#"),
        array("required" => "Y", "name" => "check_period", "placeholder" => ""),
        array("required" => "Y", "name" => "notification_interval", "placeholder" => ""),
        array("required" => "Y", "name" => "notification_period", "placeholder" => "#"),
        array("required" => "Y", "name" => "contacts", "placeholder" => ""),
        array("required" => "Y", "name" => "contacts_groups", "placeholder" => ""),
        array("required" => "Y", "name" => "_graphiteprefix", "placeholder" => ""),
        array("required" => "N", "name" => "name", "placeholder" => ""),
        array("required" => "N", "name" => "use", "placeholder" => ""),
        // array("required" => "N", "name" => "hostgroup_name", "placeholder" => ""),
        array("required" => "N", "name" => "display_name", "placeholder" => ""),
        // array("required" => "N", "name" => "servicegroups", "placeholder" => ""),
        array("required" => "N", "name" => "is_volatile", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "initial_state", "placeholder" => "[o,w,u,c]"),
        array("required" => "N", "name" => "active_checks_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "passive_checks_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "obsess_over_service", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "check_freshness", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "freshness_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "event_handler", "placeholder" => ""),
        array("required" => "N", "name" => "event_handler_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "low_flap_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "high_flap_threshold", "placeholder" => "#"),
        array("required" => "N", "name" => "failure_prediction_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "flap_detection_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "flap_detection_options", "placeholder" => "[o,w,c,u]"),
        array("required" => "N", "name" => "process_perf_data", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "parallelize_check", "placeholder" => ""),
        array("required" => "N", "name" => "normal_check_interval", "placeholder" => ""),
        array("required" => "N", "name" => "retry_check_interval", "placeholder" => ""),
        array("required" => "N", "name" => "retain_status_information", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "retain_nonstatus_information", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "first_notification_delay", "placeholder" => "#"),
        array("required" => "N", "name" => "notification_options", "placeholder" => "[w,u,c,r,f,s]"),
        array("required" => "N", "name" => "notifications_enabled", "placeholder" => "[0/1]"),
        array("required" => "N", "name" => "stalking_options", "placeholder" => "[o,w,u,c]"),
        array("required" => "N", "name" => "notes", "placeholder" => ""),
        array("required" => "N", "name" => "notes_url", "placeholder" => ""),
        array("required" => "N", "name" => "action_url", "placeholder" => ""),
        array("required" => "N", "name" => "icon_image", "placeholder" => ""),
        array("required" => "N", "name" => "icon_image_alt", "placeholder" => "")
    ];

    public function getHostConfig()
    {
        return $this->host;
    }

    public function getServiceConfig()
    {
        return $this->service;
    }
}