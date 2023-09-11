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

	var adminChart = function(){
		var options = {
		  series: [<?php echo round($percent_admin);?>],
		  chart: {
		  height: 160,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '50%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#adminChart"), options);
		chart.render();
	}

	var empChart = function(){
		var options = {
		  series: [<?php echo round($percent_emp);?>],
		  chart: {
		  height: 160,
		  type: 'radialBar',
		  sparkline:{
			  enabled:true
		  }
		},
		plotOptions: {
		  radialBar: {
			hollow: {
			  size: '50%',
			},
			dataLabels: {
              show: false,
			}
		  },
		},
		labels: [''],
		};

		var chart = new ApexCharts(document.querySelector("#empChart"), options);
		chart.render();
	}


	/* ยังไม่ได้คำนวน percent */
	var radialChart1 = function(){
		var options = {
		  series: [<?php echo $register_all;?>],
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

		var chart = new ApexCharts(document.querySelector("#radialChart1"), options);
		chart.render();
	}
	
	
	var overallChart = function(){
		var options = {
		  series: [<?php echo round($percent_program);?>],
		  chart: {
		  height: 170,
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

		var chart = new ApexCharts(document.querySelector("#overallChart"), options);
		chart.render();
	}

	var donutChart = function(){
		$("span.donut").peity("donut", {
			width: 150,
			height: 150
		});
		if ( $(window).width() <= 1600 ) {
			$("span.donut").peity("donut", {width: '120', height: '120'});
		} else {
			$("span.donut").peity("donut", {width: '150', height: '150'});
		}
		$(window).resize(function(){
			if ( $(window).width() <= 1600 ) {
				$("span.donut").peity("donut", {width: '120', height: '120'});
			} else {
				$("span.donut").peity("donut", {width: '150', height: '150'});
			}
		})
		
	}

	var reviewMonthChart = function(){
		//Multi-line labels
		new Chartist.Bar('#reviewMonthChart', {
			/*labels: [<?php 
				foreach ($monthname_review as $value) {
				echo $value.',';
			}?>],*/
			labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
			series: [
		        [<?php 
		        foreach ($monthadmin_review as $value) {
		          echo $value.',';
		        }?>],
			  	[<?php 
					foreach ($monthemp_review as $value) {
						echo $value.',';
				}?>],
				[<?php 
				  foreach ($monthcomp0_review as $value) {
					  echo $value.',';
			  }?>]
			]
		}, {
			seriesBarDistance: 10,
			// axisX: {
			//   offset: 100
			// },
			axisY: {
			  	offset: 80,
			  	labelInterpolationFnc: function(value) {
					return value
			  	},
			},
			plugins: [
			  Chartist.plugins.tooltip()
			]
		});
	}


	var userweekChart = function(){
		//Multi-line labels
		new Chartist.Bar('#userweekChart', {
			labels: ['Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.', 'Sun.'],
			series: [
		        [<?php 
					foreach ($admin_thisweek as $value) {
					echo $value.',';
				}?>],
			  	[<?php 
					foreach ($emp_thisweek as $value) {
					echo $value.',';
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
			},
			plugins: [
			  Chartist.plugins.tooltip()
			]
		});
	}

	var pieChart = function(){
		//Pie chart with custom labels
		  
		var data = {
			labels: ['45%', '55%'],
			series: [70, 30]
		  };
		  
		var options = {
			labelInterpolationFnc: function(value) {
			  return value[0]
			}
		  };
		  
		var responsiveOptions = [
			['screen and (min-width: 640px)', {
			  chartPadding: 50,
			  donut: true,
			  labelOffset: 100,
			  donutWidth: 60,
			  labelDirection: 'explode',
			  labelInterpolationFnc: function(value) {
				return value;
			  }
			}],
			['screen and (min-width: 1024px)', {
			  labelOffset: 60,
			  chartPadding: 20
			}]
		];
		  
		new Chartist.Pie('#pie-chart', data, options, responsiveOptions);
		
	}
	
	/* Function ============ */
	return {
		init:function(){
		},
		
		load:function(){
			adminChart();
			empChart();
			overallChart();
			radialChart1();
			donutChart();
			reviewMonthChart();
			pieChart();
			userweekChart();
		},
		
		resize:function(){
			adminChart();
			empChart();
			overallChart();
			radialChart1();
			donutChart();
			reviewMonthChart();
			pieChart();
			userweekChart();
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

 	var dzSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	var screenWidth = $(window).width();


	var BookkonLoginWeek = function(){
		if(jQuery('#BookkonLoginWeek').length > 0 ){

		//gradient bar chart
			const BookkonLoginWeek = document.getElementById("BookkonLoginWeek").getContext('2d');
			//generate gradient
			const BookkonLoginWeekgradientStroke = BookkonLoginWeek.createLinearGradient(0, 0, 0, 250);
			BookkonLoginWeekgradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			BookkonLoginWeekgradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");

			BookkonLoginWeek.height = 100;

			new Chart(BookkonLoginWeek, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_thisweek as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: 	[<?php 
										foreach ($login as $value) {
										echo $value.',';
									}?>],
							borderColor: BookkonLoginWeekgradientStroke,
							borderWidth: "0",
							backgroundColor: BookkonLoginWeekgradientStroke, 
							hoverBackgroundColor: BookkonLoginWeekgradientStroke
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
							barPercentage: 0.3
						}]
					}
				}
			});
		}
	}

	var BookkonLoginWeekPrevious = function(){
		if(jQuery('#BookkonLoginWeekPrevious').length > 0 ){

		//gradient bar chart
			const BookkonLoginWeekPrevious = document.getElementById("BookkonLoginWeekPrevious").getContext('2d');
			//generate gradient
			const BookkonLoginWeekgradientStroke = BookkonLoginWeekPrevious.createLinearGradient(0, 0, 0, 250);
			BookkonLoginWeekgradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			BookkonLoginWeekgradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");

			BookkonLoginWeekPrevious.height = 100;

			new Chart(BookkonLoginWeekPrevious, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_previous as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: 	[<?php 
										foreach ($login_previous as $value) {
										echo $value.',';
									}?>],
							borderColor: BookkonLoginWeekgradientStroke,
							borderWidth: "0",
							backgroundColor: BookkonLoginWeekgradientStroke, 
							hoverBackgroundColor: BookkonLoginWeekgradientStroke
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
							barPercentage: 0.3
						}]
					}
				}
			});
		}
	}

	var BookkonLoginWeekPrevious2 = function(){
		if(jQuery('#BookkonLoginWeekPrevious2').length > 0 ){

		//gradient bar chart
			const BookkonLoginWeekPrevious2 = document.getElementById("BookkonLoginWeekPrevious2").getContext('2d');
			//generate gradient
			const BookkonLoginWeekgradientStroke = BookkonLoginWeekPrevious2.createLinearGradient(0, 0, 0, 250);
			BookkonLoginWeekgradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			BookkonLoginWeekgradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");

			BookkonLoginWeekPrevious2.height = 100;

			new Chart(BookkonLoginWeekPrevious2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_previous2 as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: 	[<?php 
										foreach ($login_previous2 as $value) {
										echo $value.',';
									}?>],
							borderColor: BookkonLoginWeekgradientStroke,
							borderWidth: "0",
							backgroundColor: BookkonLoginWeekgradientStroke, 
							hoverBackgroundColor: BookkonLoginWeekgradientStroke
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

	var barAccountMonth = function(){
	if(jQuery('#barAccountMonth').length > 0 ){

		//gradient bar chart
			const barAccountMonth = document.getElementById("barAccountMonth").getContext('2d');
			//generate gradient
			const barAccountMonthgradientStroke = barAccountMonth.createLinearGradient(0, 0, 0, 250);
			barAccountMonthgradientStroke.addColorStop(0, "rgba(19, 98, 252, 1)");
			barAccountMonthgradientStroke.addColorStop(1, "rgba(19, 98, 252, 0.5)");

			barAccountMonth.height = 100;

			new Chart(barAccountMonth, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					/*labels: [<?php 
								foreach ($monthname_review as $value) {
								echo $value.',';
							}?>],*/
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ลงทะเบียน",
							data: [<?php 
									foreach ($account_month as $value) {
										echo $value.',';
									}?>],
							borderColor: barAccountMonthgradientStroke,
							borderWidth: "0",
							backgroundColor: barAccountMonthgradientStroke, 
							hoverBackgroundColor: barAccountMonthgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.4
						}],
					}
				}
			});
		}
	}

	var barAccountMonth1 = function(){
	if(jQuery('#barAccountMonth1').length > 0 ){

		//gradient bar chart
			const barAccountMonth1 = document.getElementById("barAccountMonth1").getContext('2d');
			//generate gradient
			const barAccountMonthgradientStroke = barAccountMonth1.createLinearGradient(0, 0, 0, 250);
			barAccountMonthgradientStroke.addColorStop(0, "rgba(55, 209, 89, 1)");
			barAccountMonthgradientStroke.addColorStop(1, "rgba(55, 209, 89, 0.5)");

			barAccountMonth1.height = 100;

			new Chart(barAccountMonth1, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					/*labels: [<?php 
								foreach ($monthname_review as $value) {
								echo $value.',';
							}?>],*/
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ลงทะเบียน",
							data: [<?php 
									foreach ($account_month_all as $value) {
										echo $value.',';
									}?>],
							borderColor: barAccountMonthgradientStroke,
							borderWidth: "0",
							backgroundColor: barAccountMonthgradientStroke, 
							hoverBackgroundColor: barAccountMonthgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.4
						}],
					}
				}
			});
		}
	}

	var barUsersMonth = function(){
	if(jQuery('#barUsersMonth').length > 0 ){

		//gradient bar chart
			const barUsersMonth = document.getElementById("barUsersMonth").getContext('2d');
			//generate gradient
			const barUsersMonthgradientStroke = barUsersMonth.createLinearGradient(0, 0, 0, 250);
			barUsersMonthgradientStroke.addColorStop(0, "rgba(255, 153, 51, 1)");
			barUsersMonthgradientStroke.addColorStop(1, "rgba(255, 178, 102, 0.7)");

			barUsersMonth.height = 100;

			new Chart(barUsersMonth, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					/*labels: [<?php 
								foreach ($monthname_review as $value) {
								echo $value.',';
							}?>],*/
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ผู้ใช้งาน",
							data: [<?php 
									foreach ($users_month_all as $value) {
										echo $value.',';
									}?>],
							borderColor: barUsersMonthgradientStroke,
							borderWidth: "0",
							backgroundColor: barUsersMonthgradientStroke, 
							hoverBackgroundColor: barUsersMonthgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.4
						}],
					}
				}
			});
		}
	}


	var RegisterWeekChart = function(){
	if(jQuery('#RegisterWeekChart').length > 0 ){

		//gradient bar chart
			const RegisterWeekChart = document.getElementById("RegisterWeekChart").getContext('2d');
			//generate gradient
			const RegisterWeekChartgradientStroke = RegisterWeekChart.createLinearGradient(0, 0, 0, 250);
			RegisterWeekChartgradientStroke.addColorStop(0, "rgba(255,143,159,1)");
			RegisterWeekChartgradientStroke.addColorStop(1, "rgba(255,143,159,0.5)");

			RegisterWeekChart.height = 100;

			new Chart(RegisterWeekChart, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_thisweek as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "จำนวนลงทะเบียน",
							data: [<?php 
									foreach ($regis_week['admin'] as $value) {
										echo $value.',';
									}?>],
							borderColor: RegisterWeekChartgradientStroke,
							borderWidth: "0",
							backgroundColor: RegisterWeekChartgradientStroke, 
							hoverBackgroundColor: RegisterWeekChartgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.3
						}],
					}
				}
			});
		}
	}

	var RegisterWeekPrevious = function(){
	if(jQuery('#RegisterWeekPrevious').length > 0 ){

		//gradient bar chart
			const RegisterWeekPrevious = document.getElementById("RegisterWeekPrevious").getContext('2d');
			//generate gradient
			const RegisterWeekChartgradientStroke = RegisterWeekPrevious.createLinearGradient(0, 0, 0, 250);
			RegisterWeekChartgradientStroke.addColorStop(0, "rgba(255,143,159,1)");
			RegisterWeekChartgradientStroke.addColorStop(1, "rgba(255,143,159,0.5)");

			RegisterWeekPrevious.height = 100;

			new Chart(RegisterWeekPrevious, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_previous as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "จำนวนลงทะเบียน",
							data: [<?php 
									foreach ($regis_previous['admin'] as $value) {
										echo $value.',';
									}?>],
							borderColor: RegisterWeekChartgradientStroke,
							borderWidth: "0",
							backgroundColor: RegisterWeekChartgradientStroke, 
							hoverBackgroundColor: RegisterWeekChartgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.3
						}],
					}
				}
			});
		}
	}

	var RegisterWeekPrevious2 = function(){
	if(jQuery('#RegisterWeekPrevious2').length > 0 ){

		//gradient bar chart
			const RegisterWeekPrevious2 = document.getElementById("RegisterWeekPrevious2").getContext('2d');
			//generate gradient
			const RegisterWeekChartgradientStroke = RegisterWeekPrevious2.createLinearGradient(0, 0, 0, 250);
			RegisterWeekChartgradientStroke.addColorStop(0, "rgba(255,143,159,1)");
			RegisterWeekChartgradientStroke.addColorStop(1, "rgba(255,143,159,0.5)");

			RegisterWeekPrevious2.height = 100;

			new Chart(RegisterWeekPrevious2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php 
										foreach ($label_previous2 as $value) {
										echo "'".$value."'".',';
									}?>],
					datasets: [
						{
							label: "จำนวนลงทะเบียน",
							data: [<?php 
									foreach ($regis_previous2['admin'] as $value) {
										echo $value.',';
									}?>],
							borderColor: RegisterWeekChartgradientStroke,
							borderWidth: "0",
							backgroundColor: RegisterWeekChartgradientStroke, 
							hoverBackgroundColor: RegisterWeekChartgradientStroke
						}
					]
				},
				options: {
					legend: false, 
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							},
							
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5
						}],
					}
				}
			});
		}
	}

	var reviewMonthALL = function(){
		if(jQuery('#reviewMonthALL').length > 0 ){

		//gradient bar chart
			const reviewMonthALL = document.getElementById("reviewMonthALL").getContext('2d');
			//generate gradient
			const reviewMonthALLgradientStroke = reviewMonthALL.createLinearGradient(0, 0, 0, 250);
			reviewMonthALLgradientStroke.addColorStop(0, "rgba(19, 98, 252, 1)");
			reviewMonthALLgradientStroke.addColorStop(1, "rgba(19, 98, 252, 0.5)");

			reviewMonthALL.height = 100;

			new Chart(reviewMonthALL, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "คำแนะนำ/ติชม",
							data: 	[<?php 
										foreach ($month_review_all as $value) {
										echo $value.',';
									}?>],
							borderColor: reviewMonthALLgradientStroke,
							borderWidth: "0",
							backgroundColor: reviewMonthALLgradientStroke, 
							hoverBackgroundColor: reviewMonthALLgradientStroke
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
							barPercentage: 0.3
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
			BookkonLoginWeek();
			BookkonLoginWeekPrevious();
			BookkonLoginWeekPrevious2();
			barAccountMonth();
			barAccountMonth1();
			barUsersMonth();
			RegisterWeekChart();
			RegisterWeekPrevious();
			RegisterWeekPrevious2();
			reviewMonthALL();
		},
		resize:function(){
		}
	}

}();

jQuery(window).on('load',function(){
	dzSparkLine.load();
});

jQuery(window).on('resize',function(){
	//dzSparkLine.resize();
	setTimeout(function(){ dzSparkLine.resize(); }, 1000);
});
	
})(jQuery);

</script>