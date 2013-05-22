<!DOCTYPE html>
<html>
  <head>
    <title>Skunkworks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="lib/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

    <style type="text/css">
        /*body { background:url('http://img4-3.allyou.timeinc.net/i/2010/03/graph-paper-l.jpg'); }*/
        body { background-image:url('resources/graph-20.png'); font-family:'Palatino'; }
        #site-global-header { margin-bottom:20px; }
        #site-global-header .navbar-text.pull-right { margin-left:30px; }
        #stealth { height:28px; }
        .navbar .brand { padding:6px 20px 0px; }
        .sidebar-nav { padding:9px 0px; }
        .hero-unit { padding:16px 32px; }
        .hero-unit h1 { margin-bottom:16px; font-size:44px; }
        #chart-area { min-width:700px; min-height:340px; }
    </style>

  </head>
  <body>
    <div id="site-global-header" class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><img id="stealth" alt="stealth" src="resources/stealth.png" /></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="#">Login</a>
            </p>
            <p class="navbar-text pull-right">
              <a href="#">Register</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Product 1</a></li>
              <li><a href="#">Product 2</a></li>
              <li><a href="#">Product 3</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
            <!--Sidebar content-->
            <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div>
        </div>
        <div class="span10">
            <!--Body content-->
            <div class="hero-unit">
                <h1>graph</h1>
                <div id="chart-area"></div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <h2>inputs</h2>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="http://www.flotcharts.org/flot/jquery.flot.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $.noConflict();
        jQuery(document).ready(function ($) {
            $.plot($("#chart-area"), [ { label: "F22", data: [ [10, 1], [17, -14], [30, 5] ], color:"#FF0" }, { label: "F35", data: [ [11, 13], [19, 11], [30, -7] ], color:"#00F" } ], { grid: { color: "#333", backgroundColor: { colors: ["#FFF", "#FFF"] } }, series: {
      lines: { show: true },
      points: { show: true },
    } });
        });
    </script>
  </body>
</html>


<?php

?>