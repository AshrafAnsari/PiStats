<?php

class App {
  
  // App info
  public $id = "treCakedrusan58e4UDe";
  public $name = "Pi Stats";
  public $copyright = "© 2016 Ashraf Ansari";
  
  function __construct() {
    // Authorization check
    if($_GET["id"] != $this->id){
      exit;
    }
    // Load Pi stats
    $this->stats = new PiStats;
  }
  
}

class PiStats {
  
  // Disk stats
  public function disk($disk_number) {
    switch ($disk_number) {
      case 1:
        $dir = "/";
        break;
      case 2:
        $dir = "/var/www/usbdrive";
        break;
      default:
        $dir = "";
    }
    $total_b = disk_total_space($dir);
    $free_b = disk_free_space($dir);
    $occupied_b = $total_b - $free_b;
    $total_gb = round($total_b / pow(1024,3), 1);
    $free_gb = round($free_b / pow(1024,3), 1);
    $occupied_gb = round($occupied_b / pow(1024,3), 1);
    $occupied_disk = ($total_gb - $free_gb);
    $progress_disk = floor(round(($occupied_b / $total_b * 100),2)*4)/4;
    return array("total" => $total_gb, "occupied" => $occupied_disk, "free" => $free_gb, "progress" => $progress_disk);
  }
  
  // Memory stats
  public function memory() {
    $mem_info = fopen('/proc/meminfo','r');
    while ($line = fgets($mem_info)) {  
      if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
        $mem_total = round(number_format($pieces[1],0,",","."),1);
      }
      if (preg_match('/^Active:\s+(\d+)\skB$/', $line, $pieces)) {
        $mem_active = round(number_format($pieces[1],0,",","."),1);
      }
      if (preg_match('/^Inactive:\s+(\d+)\skB$/', $line, $pieces)) {
        $mem_inactive = round(number_format($pieces[1],0,",","."),1);
      }
      if (preg_match('/^MemFree:\s+(\d+)\skB$/', $line, $pieces)) {
        $mem_free = round(number_format($pieces[1],0,",","."),1);
      }
    }
    fclose($mem_info);
    $progress_memory = floor(round(($mem_active / $mem_total * 100),2)*4)/4;
    return array("active" => $mem_active, "inactive" => $mem_inactive, "free" => $mem_free, "progress" => $progress_memory);
  }
  
  // CPU stats
  public function cpu() {
    $load_avg = sys_getloadavg();
    $load_avg_1 = ($load_avg[0] / 4) * 100;
    $load_avg_2 = ($load_avg[1] / 4) * 100;
    $load_avg_3 = ($load_avg[2] / 4) * 100;
    return array("avg1" => $load_avg_1, "avg2" => $load_avg_2, "avg3" => $load_avg_3, "progress" => $load_avg_1);
  }
  
  public function top() {
    $top = shell_exec('TERM=xterm /usr/bin/top -n1 -b');
    return "<pre>" . $top . "</pre>";
  }
  
}

$app = new App;

?>