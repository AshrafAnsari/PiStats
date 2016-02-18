<style>

  html {
    pointer-events: none;
  }

  body {
    padding: 0;
    margin: 0;
    padding-top: 0px;
    font-size: 50px;
    font-family: -apple-system-font;
    color: white;
    text-shadow: 0 0 2px black;
    background-color: #f2ffe6;
    height: 1695px;
    opacity: 0;
    transition: all .5s ease;
  }
  
  h1 {
    width: 100%;
    color: #808080;
    text-align: center;
    text-shadow: none;
    color: #BC1142;
    position: relative;
    top: -60px;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: black;
    color: white;
  }

  h3 {
    text-shadow: 0 0 2px black;
    font-weight: 300;
    margin-top: 0;
    font-size: 50px;
    margin-top: 0px;
    margin-bottom: 20px;
    display: block;
    width: 100%;
    color: white;
    background-color: #808080;
    box-shadow: 0 0 5px #4d4d4d;
    border: 2px solid black;
    padding: 20px;
    box-sizing: border-box;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    pointer-events: all;
    -webkit-user-select: none;
  }
  
  p {
    width: 100%;
    font-size: 34px;
    text-align: center;
    color: #808080;
    position: relative;
    bottom: 150px;
    text-shadow: none;
    color: #BC1142;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: black;
    font-weight: 600;
    color: white;
  }

  table {
    box-shadow: 0 0 5px black;
    width: 100%;
    border: 2px solid black;
  }

  th,
  td {
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
  }

  th {
    color: #BBE9FF;
    font-weight: 300;
    text-shadow: 0 0 2px black;
    background-color: #808080;
  }

  td {
    padding: 0;
    padding-top: 20px;
    padding-bottom: 20px;
    width: 33%;
    border-top: 2px solid black;
    background-color: #969696;
    color: wheat;
    text-shadow: 0 0 2px black;
    font-weight: 300;
  }

  progress {
    margin-top: 20px;
    border: 1px solid black;
    width: 100%;
    height: 124px;
    overflow: hidden;
    box-shadow: 0 0 5px black;
    margin-bottom: -5px;
    box-sizing: border-box;
  }

  progress[value] {
    -webkit-appearance: none;
    appearance: none;
  }

  progress[value]::-webkit-progress-bar {
    background-color: #ccff99;
    background: linear-gradient(#b3ff66, #73e600, #b3ff66);
    border: 1px solid black;
  }

  progress[value]::-webkit-progress-value {
    background: linear-gradient(#ffdb4d, #ff9933, #ffdb4d);
    border-right: 1px solid black;
    box-shadow: 0 0 15px black;
    transition: all .5s ease;
    position: relative;
  }

  progress[value]::-webkit-progress-value::before {
    position: absolute;
    right: 25px;
    top: 30px;
    width: 300px;
    display: block;
    text-align: right;
  }

  <?php
  // Generate labels for progress bar values and set progress bar colors.
  for($i = 0; $i <= 100; $i += 0.25) {
    $i=round($i, 2);
    if($i < 25) {
      echo "progress[value=\"$i\"]::-webkit-progress-value::before { content: '$i%';right: -325px; text-align: left; }\n";
    }
    else {
      echo "progress[value=\"$i\"]::-webkit-progress-value::before { content: '$i%'; }\n";
    }
  }
  ?>

  .main-visible {
    opacity: 1;
  }

  .group {
    position: relative;
    top: 20px;
    width: 100%;
    margin: 0;
    padding: 20px;
    padding-bottom: 0px;
    padding-top: 0px;
    border: 0;
    box-sizing: border-box;
    margin-bottom: 20px;
    background-color: transparent;
    border-radius: 0;
    text-align: center;
  }

  .mobile-disabled {
    display: none;
  }

  .column2 {
    border-left: 2px solid black;
    border-right: 2px solid black;
  }
  
  .progress {
    position: relative;
    z-index: 98;
  }
  
  .progress-overlay {
    width: calc(100% - 40px);
    position: absolute;
    left: 20px;
    z-index: 99;
    box-shadow: 0 0 5px transparent;
    opacity: 0;
    transition: all .5s linear;
  }
  
  .progress-overlay[value]::-webkit-progress-value {
    background: linear-gradient(#ff9999, #ff4d4d, #ff9999);
    box-shadow: none;
    transition: all .5s ease;
    position: relative;
  }
  
  .progress-overlay[value]::-webkit-progress-bar {
    background-color: gray;
    background: transparent;
    border: 1px solid black;
  }

  #memory {
    margin-top: 20px;
    padding: 20px;
    background-color: #b3b3b3;
    box-shadow: 0 0 5px #4d4d4d;
    border: 1px solid black;
    width: 250px;
    box-sizing: border-box;
    line-height: 30px;
  }
  
  #section1,
  #section2,
  #section3 {
    display: none;
  }
  
  #logo-image {
    position: relative;
    top: 50px;
    width: 100%;
    height: 900px;
    background-image: url("assets/images/icon-large.png");
    box-sizing: border-box;
    background-position: center center;
    background-repeat: no-repeat;
    transform: scale(.5);
    transition: all .2s linear;
    animation-name: none;
    animation-duration: 1.5s;
    animation-iteration-count: infinite;
  }
  
  #logo {
    position: fixed;
    top: 470px;
    width: 100%;
    display: block;
    transition: all .2s linear;
    box-sizing: border-box;
    z-index: -1;
    opacity: 0;
    -webkit-filter: blur(20px);
  }
  
  #heartrate {
    position: fixed;
    bottom: -20px;
    width: 100%;
    height: 200px;
    z-index: -2;
    background-image: url("assets/images/heartrate.png");
    background-position: top center;
    background-size: contain;
    background-repeat: no-repeat;
    -webkit-filter: grayscale(100%) contrast(100%);
    opacity: 1;
    transition: all .2s linear;
    -webkit-filter: drop-shadow(0 0 5px black);
    pointer-events: all;
  }
  
  #heartrate::before {
    position: fixed;
    display: block;
    content: "";
    bottom: 0px;
    width: 100%;
    height: 900px;
    z-index: -99;
    background: linear-gradient(transparent, #bdff80);
    opacity: .5;
  }
  
  #group-all {
    display: block;
    background-color: white;
    background: linear-gradient(white, lightgray);
    padding-bottom: 25px;
    box-shadow: 0 0 15px black;
    border-bottom: 2px solid black;
    transition: all 1s ease;
  }
  
  #main::after {
    display: block;
    content: "";
    position: fixed;
    bottom: 0;
    height: 70%;
    width: 100%;
    background-image: url("assets/images/circuit.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom center;
    z-index: -10;
    opacity: .05;
  }
  
  #top {
    position: fixed;
    top: 0;
    padding-left: 20px;
    height: 100%;
    width: 100%;
    z-index: 999;
    background-color: rgba(0,0,0,0.8);
    color: white !important;
    overflow: scroll;
    font-size: 20px;
    text-decoration: none !important;
    display: none;
    pointer-events: all;
  }
  
  @keyframes heartbeat {
    0% { transform: scale(1) skew(0deg,0deg); }
    10% { transform: scale(1.05) skew(1deg,1deg); }
    20% { transform: scale(1.05) skew(-1deg,-1deg); }
    30% { transform: scale(1) skew(0deg,0deg); }
  }
  
  @keyframes heartbeat-fast {
    0% { transform: scale(1) skew(0deg,0deg); }
    10% { transform: scale(1.05) skew(1deg,1deg); }
    20% { transform: scale(1.05) skew(-1deg,-1deg); }
    30% { transform: scale(1) skew(0deg,0deg); }
  }
  
  @keyframes heartbeat-superfast {
    0% { transform: scale(1) skew(0deg,0deg); }
    10% { transform: scale(1.05) skew(1deg,1deg); }
    20% { transform: scale(1.05) skew(-1deg,-1deg); }
    30% { transform: scale(1) skew(0deg,0deg); }
  }

</style>