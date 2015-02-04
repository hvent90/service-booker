@extends('layouts.admin')

@section('content')

<div class="row col-xs-12">
	<h2>Availabilities this Week</h2>
	<div id="countDiv" style="height: 400px;"></div>
</div>
<div class="row">
	<div class="col-xs-8">
		<h3>Top Advisors this Week</h3>
		<div id="advisorDiv" style="height: 400px;"></div>
	</div>
	<div class="col-xs-4">
		<h3>Top Locations this Week</h3>
		<div id="locationDiv" style="height: 400px;"></div>
	</div>
</div>
@stop

@section('script')

<script type="text/javascript">

$(document).ready(function() {
	AmCharts.ready(function() {
		var chart = new AmCharts.AmSerialChart();
		chart.dataProvider = {{ $availabilitiesByDay->toJson() }};
		chart.categoryField = "date";
		var graph = new AmCharts.AmGraph();
		graph.valueField = "count";
		graph.type = "column";
		graph.fillAlphas = 0.8;
		chart.angle = 30;
		chart.depth3D = 15;
		chart.addGraph(graph);
		chart.write('countDiv');

		var pieChart = new AmCharts.AmPieChart();
	});


	var airingsChart = AmCharts.makeChart("advisorDiv", {
	       "type": "pie",
	       "labelRadius": 5,
	       "minRadius": 120,
	       "outlineThickness": 10,
	       "titleField": "advisor_name",
	       "valueField": "count",
	       "theme": "default",
	       "balloon": '[[advisor_email]]',
	       "titles": [],
	       "exportConfig":{
	             menuItems: [{
	             icon: '/assets/img/export',
	             format: 'png'
	             }]
	       },
	       "dataProvider": {{ $availabilitiesByAdvisor->toJson() }}
	   });

	var chart = AmCharts.makeChart("locationDiv", {
	    "theme": "none",
	    "type": "serial",
	    "dataProvider": {{ $availabilitiesByLocation->toJson() }},
	    "graphs": [{
	        "fillAlphas": 1,
	        "lineAlpha": 0.2,
	        "type": "column",
	        "valueField": "count"
	    }],
	    "depth3D": 20,
	    "angle": 30,
	    "rotate": true,
	    "categoryField": "location_name",
	    "categoryAxis": {
	        "gridPosition": "start",
	        "fillAlpha": 0.05,
	        "position": "left"
	    },
		"exportConfig":{
			"menuTop":"20px",
	        "menuRight":"20px",
	        "menuItems": [{
	        "icon": 'http://www.amcharts.com/lib/3/images/export.png',
	        "format": 'png'	  
	        }]  
	    }
	});
	jQuery('.chart-input').off().on('input change',function() {
		var property	= jQuery(this).data('property');
		var target		= chart;
		chart.startDuration = 0;

		if ( property == 'topRadius') {
			target = chart.graphs[0];
	      	if ( this.value == 0 ) {
	          this.value = undefined;
	      	}
		}

		target[property] = this.value;
		chart.validateNow();
	});
})

</script>

@stop