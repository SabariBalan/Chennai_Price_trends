
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Roof and Floors</title>
	<link href="examples.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="excanvas.min.js"></script><![endif]-->
	
</head>
<body>

	<div id="header">
		<h2>Time vs Cost</h2>
	</div>

	<div id="content">

		<div class="demo-container">
		<div id="legendholder" ></div>
			<div id="placeholder" class="demo-placeholder" style="float:left; width:675px;">
			
			</div>
			
			<p id="choices" style="float:right; width:15%;height:75px;overflow-y:scroll; "></p>
			
		</div>



	</div>

	
	
<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<script language="javascript" type="text/javascript" src="jquery.flot.js"></script>
		 <script language="javascript" type="text/javascript" src="jquery.flot.tooltip.js"></script>
	 <script language="javascript" type="text/javascript" src="jquery.flot.tooltip.min.js"></script>

	 <?php
//create array of pairs of x and y values
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("time_series", $con);

$sth = mysql_query("SELECT year,price FROM chennai");
$rows_chennai = array();
$rows_chennai['name'] = 'Chennai';
while($r = mysql_fetch_array($sth)) {
    $dataset_chennai[] = array($r[ 'year' ],$r[ 'price' ]);
}
$sth = mysql_query("SELECT year,price FROM omr");
$rows_omr = array();
$rows_omr['name'] = 'OMR';
while($r = mysql_fetch_array($sth)) {
    $dataset_omr[] = array($r[ 'year' ],$r[ 'price' ]);
}
/* print "The parsed json is: ";
print json_encode(array($dataset_chennai,$dataset_omr)); 
 */




mysql_close($con);

?>
	<script type="text/javascript">

	$(function() {
var data_chennai = <?php echo json_encode($dataset_chennai);?>;
    var data_omr = <?php echo json_encode($dataset_omr);?>; 
	
		var datasets = {
			"Chennai": {
				label: "Chennai",
				data: data_chennai
			},        
			"OMR": {
				label: "OMR",
				data: data_omr
			}
			
		};
		
		var options={
			xaxis:{
				
				ticks:[[2000,'May 14'],
				[2001,'Jun 14'],
				[2002,'Jul 14'],
				[2003,'Aug 14'],
				[2004,'Sept 14'],
				[2005,'Oct 14'],
				[2006,'Nov 14'],
				[2007,'Dec 14'],
				[2008,'Jan 15'],
				[2009,'Feb 15'],
				[2010,'Mar 15'],
				[2011,'Apr 15'],
				[2012,'May 15']
				
				]
			}	,
			yaxis: {
						min: 0
					},
series: {
                   lines: { show: true },
                   points: { show: true }
               },	
			    
legend: { 

				show: true, container: $('#legendholder') ,
				noColumns: -100
				
				
				
				
				},
            grid: {
                backgroundColor: { colors: ["#ffffff", "#ffffff"] },
				hoverable: true,
				clickable: true

            }
           			
			
		};

		// hard-code color indices to prevent them from shifting as
		// countries are turned on/off

		var i = 0;
		$.each(datasets, function(key, val) {
			val.color = i;
			++i;
		});

		// insert checkboxes 
		var choiceContainer = $("#choices");
		$.each(datasets, function(key, val) {
			
			
	if(key=='Chennai'){		
			choiceContainer.append("<br/><input type='checkbox' checked disabled name='" + key +
				"' cid='id" + key + "' value=yes'></input>" +
				"<label for='id" + key + "'>"
				+ val.label + "</label>");
	}
			
			
			
	else{		
			choiceContainer.append("<br/><input type='checkbox' name='" + key +
				"' checked='checked' id='id" + key + "'></input>" +
				"<label for='id" + key + "'>"
				+ val.label + "</label>");
	
}






	});
		
		
		
		

		choiceContainer.find("input").click(plotAccordingToChoices);

		function plotAccordingToChoices() {

			var data = [];

			choiceContainer.find("input:checked").each(function () {
				var key = $(this).attr("name");
				if (key && datasets[key]) {
					data.push(datasets[key]);
				}
			});

			if (data.length > 0) {
				$.plot("#placeholder", data,options	
									);
			}
		}

		plotAccordingToChoices();

		// Add the Flot version string to the footer
	 function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '2px solid #3f51b5',
            padding: '2px',
            'background-color': '#536dfe',
            opacity: 0.75
        }).appendTo("body").fadeIn(200);
    }
	
	var previousPoint = null;
    $("#placeholder").bind("plothover", function (event, pos, item) {
        	
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0],
                        y = item.datapoint[1];
                    
                    showTooltip(item.pageX, item.pageY,
                                item.series.label +  " Rs. " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        
       
    });

	
	});

	</script>
</body>
</html>
