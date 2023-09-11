<script type="text/javascript">
	(function($) {
    "use strict" 

 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var labelPlacementChart1 = function(){
		//Label placement
  
		new Chartist.Bar('#chart-week', {
			labels: ['Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.', 'Sun.'],
			series: [
			  [<?php 
        foreach ($techn_thisweek as $value) {
          echo $value['total_techn'].',';
        }?>],
        [<?php 
        foreach ($job_thisweek as $value) {
          echo $value['total_job'].',';
        }?>]
			]
		}, {
		axisX: {
			  // On the x-axis start means top and end means bottom
			  position: 'start'
		},
		axisY: {
			  // On the y-axis start means left and end means right
			  position: 'end'
			},
		plugins: [
			  Chartist.plugins.tooltip()
			]
		});
	}

	var jobpostChart = function(){
		var options = {
		  series: [<?php echo $job_all['total'];?>],
		  chart: {
		  height: <?php echo $result_total;?>,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '35%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#jobpostChart"), options);
		chart.render();
	}
	var technpostChart = function(){
		var options = {
		  series: [<?php echo $techn_all['total'];?>],
		  chart: {
		  height: <?php echo $result_total;?>,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '35%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#technpostChart"), options);
		chart.render();
	}

	var donutChart = function(){
		$("span.donut").peity("donut", {
			width: 150,
			height: 150
		});
		if ( $(window).width() <= 1600 ) {
			$("span.donut").peity("donut", {width: '110', height: '110'});
		} else {
			$("span.donut").peity("donut", {width: '150', height: '150'});
		}
		$(window).resize(function(){
			if ( $(window).width() <= 1600 ) {
				$("span.donut").peity("donut", {width: '110', height: '110'});
			} else {
				$("span.donut").peity("donut", {width: '150', height: '150'});
			}
		})
	}

	/* Function ============ */
	return {
		init:function(){
		},
		
		load:function(){
			labelPlacementChart1();
			jobpostChart();
			technpostChart();
			donutChart();
		},
		
		resize:function(){
			labelPlacementChart1();
			jobpostChart();
			technpostChart();
			donutChart();
		}
	}

}();

jQuery(document).ready(function(){
});
	
jQuery(window).on('load',function(){
	setTimeout(function(){
		dzChartlist.resize();	
	}, 1000);
});

jQuery(window).on('resize',function(){
	setTimeout(function(){
		dzChartlist.resize();	
	}, 1000);
	
});     

})(jQuery);

/*====================*/
(function($) {
  "use strict" 

	
	/* function draw() {
		
	} */

 var dzSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	var screenWidth = $(window).width();

	var barChartContactMonth = function(){
		if(jQuery('#barChartContactMonth').length > 0 ){

		//gradient bar chart
			const barChartContactMonth = document.getElementById("barChartContactMonth").getContext('2d');
			//generate gradient
			const barChartContactMonthgradientStroke = barChartContactMonth.createLinearGradient(0, 0, 0, 250);
			barChartContactMonthgradientStroke.addColorStop(0, "rgba(19, 98, 252, 1)");
			barChartContactMonthgradientStroke.addColorStop(1, "rgba(19, 98, 252, 0.5)");

			barChartContactMonth.height = 100;

			new Chart(barChartContactMonth, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
        foreach ($monthname_contact as $value) {
          echo $value.',';
        }?>],
					datasets: [
						{
							label: "คำแนะนำ/ติชม",
							data: [<?php 
				        foreach ($month_contact as $value) {
				          echo $value['contact_count'].',';
				        }?>],
							borderColor: barChartContactMonthgradientStroke,
							borderWidth: "0",
							backgroundColor: barChartContactMonthgradientStroke, 
							hoverBackgroundColor: barChartContactMonthgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5
						}]
					}
				}
			});
		}
	}

	/* Function ============ */
	return {
		init:function(){
		},
		load:function(){	
			barChartContactMonth();
		},
		resize:function(){
		}
	}

}();

jQuery(document).ready(function(){
});
	
jQuery(window).on('load',function(){
	dzSparkLine.load();
});

jQuery(window).on('resize',function(){
	//dzSparkLine.resize();
	setTimeout(function(){ dzSparkLine.resize(); }, 1000);
});
	
})(jQuery);




</script>