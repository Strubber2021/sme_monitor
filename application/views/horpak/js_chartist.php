<script type="text/javascript">

(function($) {
    "use strict" 
 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var setChartWidth = function(){
		
		if(screenWidth <= 768)
		{
			var chartBlockWidth = 0;
			if(screenWidth >= 500)
			{
				chartBlockWidth = 250;
			}else{
				chartBlockWidth = 300;
			}
			
			jQuery('.chartlist-chart').css('min-width',chartBlockWidth - 31);
		}
	}
	
	var RegisterChart = function(){
		//Multi-line labels
		new Chartist.Bar('#RegisterChart', {
			labels: ['Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.', 'Sun.'],
			series: [
				[<?php 
					foreach ($admin_facebook as $value) {
					echo $value['total'].',';
				}?>],
				[<?php 
					foreach ($admin_google as $value) {
					echo $value['total'].',';
				}?>],
				[<?php 
					foreach ($admin_email as $value) {
					echo $value['total'].',';
				}?>]
			]
		}, {
			seriesBarDistance: 10,
			axisX: {
			  offset: 60
			},
			axisY: {
			  offset: 80,
			  labelInterpolationFnc: function(value) {
				return value
			  },
			  scaleMinSpace: 30
			},
			plugins: [
			  Chartist.plugins.tooltip()
			]
		});
	}


	var RegisterWeekChart = function(){
		//Label placement
		new Chartist.Bar('#RegisterWeekChart', {
			labels: ['Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.', 'Sun.'],
			series: [
				[<?php 
					foreach ($admin_thisweek as $value) {
					echo $value['total'].',';
				}?>],
			  [<?php 
					foreach ($employee1_thisweek as $value) {
					echo $value['total'].',';
				}?>],
				 [<?php 
					foreach ($employee2_thisweek as $value) {
					echo $value['total'].',';
				}?>],
			  	[<?php 
					foreach ($employee3_thisweek as $value) {
					echo $value['total'].',';
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

	var percentAdmin = function(){
		var options = {
		  series: [<?php echo round($percent_admin);?>],
		  chart: {
		  height: 135,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '45%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};
		var chart = new ApexCharts(document.querySelector("#percentAdmin"), options);
		chart.render();
	}

	var percentEmployee1 = function(){
		var options = {
		  series: [<?php echo round($percent_employee1);?>],
		  chart: {
		  height: 135,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '45%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#percentEmployee1"), options);
		chart.render();
	}

	var percentEmployee2 = function(){
		var options = {
		  series: [<?php echo round($percent_employee2);?>],
		  chart: {
		  height: 135,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '45%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#percentEmployee2"), options);
		chart.render();
	}

	var percentEmployee3 = function(){
		var options = {
		  series: [<?php echo round($percent_employee2);?>],
		  chart: {
		  height: 135,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '45%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#percentEmployee3"), options);
		chart.render();
	}

	var CommentAllChart = function(){
		//Multi-line labels
		new Chartist.Bar('#CommentAllChart', {
			labels: [<?php 
		        foreach ($monthname_comment as $value) {
		          echo $value.',';
		        }?>],
			series: [
			  	[<?php 
		        foreach ($month_comment_admin as $value) {
		          echo $value['total'].',';
		        }?>],
		        [<?php 
		        foreach ($month_comment_emp1 as $value) {
		          echo $value['total'].',';
		        }?>],
			  	[<?php 
		        foreach ($month_comment_emp2 as $value) {
		          echo $value['total'].',';
		        }?>],
		      [<?php 
		        foreach ($month_comment_emp2 as $value) {
		          echo $value['total'].',';
		        }?>]
			]
		}, {
			seriesBarDistance: 10,
			axisX: {
			  offset: 60
			},
			axisY: {
			  offset: 80,
			  labelInterpolationFnc: function(value) {
				return value
			  },
			  scaleMinSpace: 15
			},
			plugins: [
			  Chartist.plugins.tooltip()
			]
		});
	}

	var overallProgram = function(){
		var options = {
		  series: [<?php echo round($percent_program);?>],
		  chart: {
		  height: 150,
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

		var chart = new ApexCharts(document.querySelector("#overallProgram"), options);
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
			RegisterChart();
			RegisterWeekChart();
			percentAdmin();
			percentEmployee1();
			percentEmployee2();
			percentEmployee3();
			CommentAllChart();
			overallProgram();
			donutChart();
		},
		
		resize:function(){
			RegisterChart();
			RegisterWeekChart();
			percentAdmin();
			percentEmployee1();
			percentEmployee2();
			percentEmployee3();
			CommentAllChart();
			overallProgram();
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





/* ======================================================= */

(function($) {
  "use strict" 

	
	/* function draw() {
		
	} */

 var dzSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	var screenWidth = $(window).width();

		var barChartMonth = function(){
		if(jQuery('#barChartMonth').length > 0 ){

		//gradient bar chart
			const barChartMonth = document.getElementById("barChartMonth").getContext('2d');
			//generate gradient
			const barChartMonthgradientStroke = barChartMonth.createLinearGradient(0, 0, 0, 250);
			barChartMonthgradientStroke.addColorStop(0, "rgba(19, 98, 252, 1)");
			barChartMonthgradientStroke.addColorStop(1, "rgba(19, 98, 252, 0.5)");

			barChartMonth.height = 100;

			new Chart(barChartMonth, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
								foreach ($monthname_comment as $value) {
								echo $value.',';
							}?>],
					datasets: [
						{
							label: "คำแนะนำ/ติชม",
							data: 	[<?php 
										foreach ($month_comment_all as $value) {
										echo $value['total'].',';
									}?>],
							borderColor: barChartMonthgradientStroke,
							borderWidth: "0",
							backgroundColor: barChartMonthgradientStroke, 
							hoverBackgroundColor: barChartMonthgradientStroke
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
			barChartMonth();
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