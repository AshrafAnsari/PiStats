<script>
  
  var progressBarThreshold1 = 50;
  var progressBarThreshold2 = 90;
  
  // Show main app content.
  function showMain() {
    document.getElementById("main").className = "main-visible";
    setTimeout (function() {
      document.getElementById("logo").style.opacity = "1";
      document.getElementById("logo").style.webkitFilter = "blur(0px) grayscale(0%)";
      document.getElementById("logo-image").style.transform = "scale(1)";
    }, 300);
    setTimeout (function() {
      if (<?php echo $app->stats->cpu()["avg1"]; ?> > progressBarThreshold1 && <?php echo $app->stats->cpu()["avg1"]; ?> <= progressBarThreshold2) {
        document.getElementById("logo-image").style.animationDuration = "1s";
        document.getElementById("logo-image").style.animationName = "heartbeat-fast";
      }
      else if (<?php echo $app->stats->cpu()["avg1"]; ?> > progressBarThreshold2) {
        document.getElementById("logo-image").style.animationDuration = ".5s";
        document.getElementById("logo-image").style.animationName = "heartbeat-superfast";
      }
      else {
        document.getElementById("logo-image").style.animationDuration = "1.5s";
        document.getElementById("logo-image").style.animationName = "heartbeat";
      }
    }, 800);
  }
  
  // Update tables and progress bars.
  function updateStats() {
    setTimeout (function() {
      document.getElementById("progress-disk1").value = <?php echo $app->stats->disk(1)["progress"]; ?>;
      if (<?php echo $app->stats->disk(1)["progress"]; ?> > progressBarThreshold1) {
        document.getElementById("progress-disk1-overlay").style.opacity = "1";
      }
      else {
        document.getElementById("progress-disk1-overlay").style.opacity = "0";
      }
      document.getElementById("progress-disk2").value = <?php echo $app->stats->disk(2)["progress"]; ?>;
      if (<?php echo $app->stats->disk(2)["progress"]; ?> > progressBarThreshold1) {
        document.getElementById("progress-disk2-overlay").style.opacity = "1";
      }
      else {
        document.getElementById("progress-disk2-overlay").style.opacity = "0";
      }
      document.getElementById("progress-memory").value = <?php echo $app->stats->memory()["progress"]; ?>;
      if (<?php echo $app->stats->memory()["progress"]; ?> > progressBarThreshold1) {
        document.getElementById("progress-memory-overlay").style.opacity = "1";
      }
      else {
        document.getElementById("progress-memory-overlay").style.opacity = "0";
      }
      document.getElementById("progress-cpu").value = <?php echo $app->stats->cpu()["avg1"]; ?>;
      if (<?php echo $app->stats->cpu()["avg1"]; ?> > progressBarThreshold1) {
        document.getElementById("progress-cpu-overlay").style.opacity = "1";
      }
      else {
        document.getElementById("progress-cpu-overlay").style.opacity = "0";
      }
    }, 200);
    setInterval (function() {
      var xmlhttp = new XMLHttpRequest();
      var url = "/apps/pistats/ajax.php/?id=<?php echo $app->id; ?>";
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var update = JSON.parse(xmlhttp.responseText);
          document.getElementById("disk-total1").innerHTML = update.DiskTotal1;
          document.getElementById("disk-free1").innerHTML = update.DiskFree1;
          document.getElementById("disk-occupied1").innerHTML = update.DiskOccupied1;
          document.getElementById("progress-disk1").value = update.DiskOccupiedProgress1;
          if (update.DiskOccupiedProgress1 > progressBarThreshold1) {
            document.getElementById("progress-disk1-overlay").style.opacity = "1";
          }
          else {
            document.getElementById("progress-disk1-overlay").style.opacity = "0";
          }
          document.getElementById("disk-total2").innerHTML = update.DiskTotal2;
          document.getElementById("disk-free2").innerHTML = update.DiskFree2;
          document.getElementById("disk-occupied2").innerHTML = update.DiskOccupied2;
          document.getElementById("progress-disk2").value = update.DiskOccupiedProgress2;
          if (update.DiskOccupiedProgress2 > progressBarThreshold1) {
            document.getElementById("progress-disk2-overlay").style.opacity = "1";
          }
          else {
            document.getElementById("progress-disk2-overlay").style.opacity = "0";
          }
          document.getElementById("memory-free").innerHTML = update.MemFree;
          document.getElementById("memory-active").innerHTML = update.MemActive;
          document.getElementById("memory-inactive").innerHTML = update.MemInactive;
          document.getElementById("progress-memory").value = update.MemProgress;
          document.getElementById("progress-memory-overlay").value = update.MemProgress;
          if (update.MemProgress > progressBarThreshold1) {
            document.getElementById("progress-memory-overlay").style.opacity = "1";
          }
          else {
            document.getElementById("progress-memory-overlay").style.opacity = "0";
          }
          document.getElementById("cpu1").innerHTML = update.Cpu1;
          document.getElementById("cpu2").innerHTML = update.Cpu2;
          document.getElementById("cpu3").innerHTML = update.Cpu3;
          document.getElementById("progress-cpu").value = update.CpuProgress;
          document.getElementById("progress-cpu-overlay").value = update.CpuProgress;
          if (update.Cpu1 > progressBarThreshold1 && update.Cpu1 <= progressBarThreshold2) {
            document.getElementById("logo-image").style.animationDuration = "1s";
            document.getElementById("logo-image").style.animationName = "heartbeat-fast";
          }
          else if (update.Cpu1 > progressBarThreshold2) {
            document.getElementById("logo-image").style.animationDuration = ".5s";
            document.getElementById("logo-image").style.animationName = "heartbeat-superfast";
          }
          else {
            document.getElementById("logo-image").style.animationDuration = "1.5s";
            document.getElementById("logo-image").style.animationName = "heartbeat";
          }
          if (update.Cpu1 > progressBarThreshold1) {
            document.getElementById("progress-cpu-overlay").style.opacity = "1";
          }
          else {
            document.getElementById("progress-cpu-overlay").style.opacity = "0";
          }
          document.getElementById("top").innerHTML = update.Top;
        }
      };
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
    }, 1000);
  }
  
  // Button action class.
  function button(section) {
    this.status;
    this.title = "title" + section;
    this.section = "section" + section;
    this.action = function() {
      if (section == 0) {
        button1.status = "closed";
        button2.status = "closed";
        button3.status = "closed";
        button1.action();
        button2.action();
        button3.action();
        document.getElementById("title0").style.display = "none";
      }
      else {
       if (this.status == "expanded") {
        this.status = "closed";
          document.getElementById(this.title).style.backgroundColor = "";
          document.getElementById(this.section).style.display = "none";
          document.getElementById("title0").style.display = "";
        }
        else {
          this.status = "expanded";
          document.getElementById(this.title).style.backgroundColor = "#595959";
          document.getElementById(this.section).style.display = "inline";
          if (button1.status == "expanded" && button2.status == "expanded" && button3.status == "expanded") {
            document.getElementById("title0").style.display = "none";
          }
        } 
      }
      if (button1.status == "expanded" || button2.status == "expanded" || button3.status == "expanded") {
        document.getElementById("logo-image").style.opacity = "0";
        document.getElementById("logo-image").style.webkitFilter = "blur(50px) grayscale(50%)";
      }
      else {
        document.getElementById("logo-image").style.opacity = "1";
        document.getElementById("logo-image").style.webkitFilter = "blur(0px) grayscale(0%)";
      }
    };
  }
  
  function hideTop() {
    document.getElementById("top").style.display = "none";
  }
  
  function showTop() {
    document.getElementById("top").style.display = "block";
  }
  
  // Assign functions to buttons.
  function assignButtonActions() {
    for (i = 0; i < 4; i++) {
      (function(i) {
        var elementId = "title" + i;
        var functionName = "button" + i;
        var methodName = "action";
        window[functionName] = new button(i);
        document.getElementById(elementId).addEventListener("touchstart", function(){ window[functionName][methodName](); });
      }(i));
    } 
  }
  
  assignButtonActions();
  updateStats();
  
</script>