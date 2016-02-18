<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html>
  
  <!-- APP META START -->
  <head>
    <title><?php echo $app->name; ?></title>
    <link rel="apple-touch-icon" href="assets/images/icon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="viewport" content="user-scalable=no" />
    <meta charset="UTF-8">
    <?php require_once "style.php"; ?>
  </head>
  <!-- APP META END -->
  
  <!-- APP CONTENT START -->
  <body id="main" onload="showMain();">
    <!-- MENU SECTION START -->
    <span id="group-all">
      
      <!-- DISK SECTION START -->
      <div class="group" id="group1">
        <h3 id="title1">Disk</h3>
        <span id="section1">
          <table class="table" id="table1" cellspacing="0">
            <tr>
              <th class="column1">Total</th>
              <th class="column2">Occupied</th>
              <th class="column3">Free</th>
            </tr>
            <tr>
              <td class="column1"><span id="disk-total1"><?php echo $app->stats->disk(1)["total"]; ?></span>&nbsp;GB</td>
              <td class="column2"><span id="disk-occupied1"><?php echo $app->stats->disk(1)["occupied"]; ?></span>&nbsp;GB</td>
              <td class="column3"><span id="disk-free1"><?php echo $app->stats->disk(1)["free"]; ?></span>&nbsp;GB</td>
            </tr>
            <tr>
              <td class="column1"><span id="disk-total2"><?php echo $app->stats->disk(2)["total"]; ?></span>&nbsp;GB</td>
              <td class="column2"><span id="disk-occupied2"><?php echo $app->stats->disk(2)["occupied"]; ?></span>&nbsp;GB</td>
              <td class="column3"><span id="disk-free2"><?php echo $app->stats->disk(2)["free"]; ?></span>&nbsp;GB</td>
            </tr>
          </table>
          <progress class="progress" id="progress-disk1" value="<?php echo $app->stats->disk(1)["progress"]; ?>" max="100"></progress>
          <progress class="progress-overlay" id="progress-disk1-overlay" value="<?php echo $app->stats->disk(1)["progress"]; ?>" max="100"></progress>
          <progress class="progress" id="progress-disk2" value="<?php echo $app->stats->disk(2)["progress"]; ?>" max="100"></progress>
          <progress class="progress-overlay" id="progress-disk2-overlay" value="<?php echo $app->stats->disk(2)["progress"]; ?>" max="100"></progress>
        </span>
      </div>
      <!-- DISK SECTION END -->

      <!-- MEMORY SECTION START -->
      <div class="group" id="group2">
        <h3 id="title2">Memory</h3>
        <span id="section2">
          <table class="table" id="table2" cellspacing="0">
            <tr>
              <th class="column1">Active</th>
              <th class="column2">Inactive</th>
              <th class="column3">Free</th>
            </tr>
            <tr>
              <td class="column1"><span id="memory-active"><?php echo $app->stats->memory()["active"]; ?></span>&nbsp;MB</td>
              <td class="column2"><span id="memory-inactive"><?php echo $app->stats->memory()["inactive"]; ?></span>&nbsp;MB</td>
              <td class="column3"><span id="memory-free"><?php echo $app->stats->memory()["free"]; ?></span>&nbsp;MB</td>
            </tr>
          </table>
          <progress class="progress" id="progress-memory" value="<?php echo $app->stats->memory()["progress"]; ?>" max="100"></progress>
          <progress class="progress-overlay" id="progress-memory-overlay" value="<?php echo $app->stats->memory()["progress"]; ?>" max="100"></progress>
        </span>
      </div>
      <!-- MEMORY SECTION END -->

      <!-- CPU SECTION START -->
      <div class="group" id="group3">
        <h3 id="title3">CPU</h3>
        <span id="section3">
          <table class="table" id="table3" cellspacing="0">
            <tr>
              <th class="column1">1&nbsp;min</th>
              <th class="column2">5&nbsp;min</th>
              <th class="column3">15&nbsp;min</th>
            </tr>
            <tr>
              <td class="column1"><span id="cpu1"><?php echo $app->stats->cpu()["avg1"]; ?></span>&nbsp;%</td>
              <td class="column2"><span id="cpu2"><?php echo $app->stats->cpu()["avg2"]; ?></span>&nbsp;%</td>
              <td class="column3"><span id="cpu3"><?php echo $app->stats->cpu()["avg3"]; ?></span>&nbsp;%</td>
            </tr>
          </table>
          <progress class="progress" id="progress-cpu" value="<?php echo $app->stats->cpu()["avg1"]; ?>" max="100"></progress>
          <progress class="progress-overlay" id="progress-cpu-overlay" value="<?php echo $app->stats->cpu()["avg1"]; ?>" max="100"></progress>
        </span>
      </div>
      <!-- CPU SECTION END -->

      <!-- BUTTON ALL SECTION START -->
      <div class="group" id="group0">
        <h3 id="title0">All</h3>
      </div>
      <!-- BUTTON ALL SECTION END -->
      
    </span>
    <!-- MENU SECTION END -->
    
    <div id="top" ontouchstart="hideTop();">
      <?php echo $app->stats->top(); ?>
    </div>
    
    <!-- LOGO SECTION START -->
    <span id="logo">
      <div id="logo-image"></div>
      <h1>
        <?php echo $app->name; ?>
      </h1>
      <p>
        <?php echo $app->copyright; ?>
      </p>
    </span>
    <div id="heartrate" ontouchstart="showTop();"></div>
    <!-- LOGO SECTION END -->
    
    <!-- SCRIPTS START -->
    <?php require_once "script.js.php"; ?>
    <script src="inobounce.js"></script>
    <!-- SCRIPTS END -->
    
  </body>
  <!-- APP CONTENT END -->
  
</html>