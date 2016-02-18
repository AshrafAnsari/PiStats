<?php

require_once "functions.php";

// An array containing data for the AJAX response.
$ajax_data = array(
  
  // Disk1 data
  'DiskTotal1' => $app->stats->disk(1)["total"],
  'DiskOccupied1' => $app->stats->disk(1)["occupied"],
  'DiskFree1' => $app->stats->disk(1)["free"],
  'DiskOccupiedProgress1' => $app->stats->disk(1)["progress"],
  
  // Disk2 data
  'DiskTotal2' => $app->stats->disk(2)["total"],
  'DiskOccupied2' => $app->stats->disk(2)["occupied"],
  'DiskFree2' => $app->stats->disk(2)["free"],
  'DiskOccupiedProgress2' => $app->stats->disk(2)["progress"],
  
  // Memory data
  'MemActive' => $app->stats->memory()["active"],
  'MemInactive' => $app->stats->memory()["inactive"],
  'MemFree' => $app->stats->memory()["free"],
  'MemProgress' => $app->stats->memory()["progress"],
  
  // CPU data
  'Cpu1' => $app->stats->cpu()["avg1"],
  'Cpu2' => $app->stats->cpu()["avg2"],
  'Cpu3' => $app->stats->cpu()["avg3"],
  'CpuProgress' => $app->stats->cpu()["avg1"],
  
  // Top stats
  'Top' => $app->stats->top(),
  
);

// Output AJAX response data in JSON format.
echo json_encode($ajax_data);

?>