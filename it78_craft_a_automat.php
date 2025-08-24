<?php

class ARVRModuleMonitor {
    private $module_status = [];
    private $modules = ["ARCamera", "VRHeadset", "SensorArray"];

    public function __construct() {
        foreach ($this->modules as $module) {
            $this->module_status[$module] = "offline";
        }
    }

    public function check_module_status($module_name) {
        if (in_array($module_name, $this->modules)) {
            $status = rand(0, 1) ? "online" : "offline";
            $this->module_status[$module_name] = $status;
            return $status;
        } else {
            return "Module not found";
        }
    }

    public function display_module_status() {
        foreach ($this->modules as $module) {
            echo "Module: $module - Status: " . $this->module_status[$module] . "\n";
        }
    }
}

$monitor = new ARVRModuleMonitor();
echo "Initial Module Status:\n";
$monitor->display_module_status();

$modules_to_check = ["ARCamera", "VRHeadset", "SensorArray"];
foreach ($modules_to_check as $module) {
    echo "Checking $module...\n";
    $status = $monitor->check_module_status($module);
    echo "$module is $status\n";
}

echo "Updated Module Status:\n";
$monitor->display_module_status();

?>