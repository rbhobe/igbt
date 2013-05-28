<!DOCTYPE html>
<html>
  <head>
    <title>Skunkworks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="lib/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefine+Slab' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body { background-image:url('resources/graph-20.png'); font-family:'PT Serif'; } /* Palatino */
        #site-global-header { margin-bottom:20px; }
        #site-global-header .navbar-text.pull-right { margin-left:30px; }
        #stealth { height:28px; }
        .navbar .brand { padding:6px 20px 0px; }
        .sidebar-nav { padding:9px 0px; }
        .nav-header { font-family:'Josefine Slab'; font-weight:300; }
        .hero-unit { padding:16px 32px; background-color:transparent; }
        .hero-unit h1 { margin-bottom:16px; font-size:44px; font-family:'Josefine Slab'; font-weight:300; display:inline-block; margin-right:40px; }
        .hero-unit h1 span { font-size:22px; font-style:italic; font-family:'PT Serif'; }
        #chart-inputs { display:inline-block; }
        #chart-inputs fieldset > * { margin-left:12px; }

        #chart-inputs form { margin-bottom:0; }
        #chart-inputs #plot-irange-option-container { display: inline-block; width: 70px; margin-top: -14px; margin-left:18px; vertical-align: top; }
        #chart-area { min-width:700px; min-height:340px; }
        #feedback-sidebar-link { font-size:12px; }
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
              <li class="nav-header">Toolkit</li>
              <li class="active"><a href="#">F<sub>22</sub> Raptor</a></li>
              <li><a href="#">F<sub>35</sub> Joint Strike Fighter</a></li>
              <li><a href="#">F<sub>40</sub> SpaceGen Fighter</a></li>
              <li class="divider"></li>
              <li class="nav-header">Help</li>
              <li><a href="#">FAQ</a></li>
              <li id="feedback-sidebar-link"><a href="#">Feedback - We're Listening!</a></li>
            </ul>
          </div>
        </div>
        <div class="span10">
            <!--Body content-->
            <div class="hero-unit">
                <h1>V<sub>ce,on</sub> <span>vs.</span> I<sub>c</sub></h1>

                <div id="chart-inputs">
                    <form id="chart-input-values" class="form-inline">
                      <fieldset>
                        
                        <select class="input-medium" name="part">
                          <option value="0" selected="selected">Choose a part</option>
                          <option value="1">Landing Gear</option>
                          <option value="2">Cockpit</option>
                          <option value="3">Engine</option>
                          <option value="4">Wings and Flaps</option>
                        </select>

                        <div class="input-append">
                          <input class="input-mini" name="tj" value="50" placeholder="Set Tj" type="text">
                          <span class="add-on">&deg;C</span>
                        </div>

                        <div id="plot-irange-option-container">
                            <label class="radio">
                              <input type="radio" name="iRangeType" id="default-range" value="default" checked>
                              Default
                            </label>
                            <label class="radio">
                              <input type="radio" name="iRangeType" id="custom-range" value="custom">
                              Custom
                            </label>
                        </div>

                        <div class="input-append">
                            <input type="text" name="imin" value="0" placeholder="Imin" class="input-mini">
                            <span class="add-on">A</span>
                        </div>
                        <span>to</span>
                        <div class="input-append">
                            <input type="text" name="imax" value="4" placeholder="Imax" class="input-mini">
                            <span class="add-on">A</span>
                        </div>

                        <button type="submit" class="btn btn-primary btn-large">Plot</button>
                        
                      </fieldset>
                    </form>
                </div>

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
    <script src="http://www.parsecdn.com/js/parse-1.2.7.min.js"></script>

    <script type="text/javascript">
        /*
        Parse.initialize("nMHlX6LAe9u4b8mrCf4Z6U7LFe8qqtmRyf2QJS4i", "j48WOEkenEsDmE70X63KzFNj12sH5TrZlsYbKnWY");

        var TestObject = Parse.Object.extend("TestObject");
        var testObject = new TestObject();
        testObject.save({foo: "bar"}, {
          success: function(object) {
            alert("yay! it worked");
          }
        });
        */
    </script>

    <script type="text/javascript">
        $.noConflict();
        var plot; 
        var plotOptions = { 
                            grid: { color: "#333", backgroundColor: { colors: ["#FFF", "#FFF"] }, hoverable:true }, 
                            legend: { position: 'se' },
                            series: { lines: { show: true }, points: { show: true } },
                            xaxis: { min:0.5, max:3.2 },
                            yaxis: { min:-2 }
                        };

        jQuery(document).ready(function ($) {

            // Get the data on first page load
            $.get("/ajax/compute/ServiceA.php", { type: "ROHANPART123" }).done(function(resp) {
              
                var data = resp['payload'][0]['data'];

                // Perform the plotting
                plot = $.plot($("#chart-area"), [ { label: "F22 Raptor at T<sub>j</sub>=50C", data: data, color:"#19558d" } ], plotOptions);

                // Show values when hovering on data points
                var previousPoint = null;
                $("#chart-area").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));

                    if (item) {
                       if (previousPoint != item.dataIndex) {
                           previousPoint = item.dataIndex;
                                
                           $("#tooltip").remove();
                           xVal = data[item.dataIndex][0];
                           yVal = data[item.dataIndex][1];
                           showTooltip(item.pageX, item.pageY, "I = "+yVal+"A<br />"+"V<sub>ce,on</sub> = "+xVal+"V");
                       }
                    }
                    else {
                       $("#tooltip").remove();
                       previousPoint = null;            
                    }
                });

                
            });
    
            // Intercept form submit, validate, and fire off form
            $("#chart-input-values").submit(function (e) {
                e.preventDefault(); //prevent default form submit

                $.get('/ajax/compute/compute-and-dump-vals.php', $('#chart-input-values').serialize() ).done(function(resp) {
                    console.log(resp);

                    newData = [[0,0], [1,1], [2,2]];
                    // redraw the graph
                    plot.setData([ { label: "NextGen", data:newData, color:"#19558d" } ]); 
                    plot.setupGrid(); //only necessary if your new data will change the axes or grid
                    plot.draw();
                });
                
            });


            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    top: y + 5,
                    left: x + 5,
                    border: '1px solid #fdd',
                    padding: '2px',
                    'background-color': '#fee',
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }


        });
    </script>

  </body>
</html>


<?php

?>