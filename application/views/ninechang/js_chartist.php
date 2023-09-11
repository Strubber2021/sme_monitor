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


	var donutChart = function(){
		$("span.donut").peity("donut", {
			width: 150,
			height: 150
		});
		if ( $(window).width() <= 1600 ) {
			$("span.donut").peity("donut", {width: '130', height: '130'});
		} else {
			$("span.donut").peity("donut", {width: '150', height: '150'});
		}
		$(window).resize(function(){
			if ( $(window).width() <= 1600 ) {
				$("span.donut").peity("donut", {width: '130', height: '130'});
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
			donutChart();
		},
		
		resize:function(){
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



//=====================================================================//

(function($) {
  "use strict" 

	var dzSparkLine = function(){
		let draw = Chart.controllers.line.__super__.draw; //draw shadow
		var screenWidth = $(window).width();

		var barLoginWeek = function(){
			if(jQuery('#barLoginWeek').length > 0 ){

			const barLoginWeek = document.getElementById("barLoginWeek").getContext('2d');
			const barLoginWeekgradientStroke = barLoginWeek.createLinearGradient(0, 0, 0, 250);
			barLoginWeekgradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			barLoginWeekgradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");

			barLoginWeek.height = 100;

			new Chart(barLoginWeek, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php foreach($label_thisweek as $value){ echo "'".$value."'".','; }?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: [<?php foreach($login as $value){	echo $value.',';}?>],
							borderColor: barLoginWeekgradientStroke,
							borderWidth: "0",
							backgroundColor: barLoginWeekgradientStroke, 
							hoverBackgroundColor: barLoginWeekgradientStroke
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
							barPercentage: 0.25
						}]
					}
				}
			});
		}
	}

	var barLoginPrevious = function(){
		if(jQuery('#barLoginPrevious').length > 0 ){
			const barLoginPrevious = document.getElementById("barLoginPrevious").getContext('2d');
			const barLoginPreviousgradientStroke = barLoginPrevious.createLinearGradient(0, 0, 0, 250);
			barLoginPreviousgradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			barLoginPreviousgradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");
			barLoginPrevious.height = 100;

			new Chart(barLoginPrevious, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php foreach($label_previous as $value){echo "'".$value."'".',';}?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: [<?php foreach($login_previous as $value){echo $value.',';}?>],
							borderColor: barLoginPreviousgradientStroke,
							borderWidth: "0",
							backgroundColor: barLoginPreviousgradientStroke, 
							hoverBackgroundColor: barLoginPreviousgradientStroke
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
							barPercentage: 0.25
						}]
					}
				}
			});
		}
	}

	var barLoginPrevious2 = function(){
		if(jQuery('#barLoginPrevious2').length > 0 ){
			const barLoginPrevious2 = document.getElementById("barLoginPrevious2").getContext('2d');
			const barLoginPrevious2gradientStroke = barLoginPrevious2.createLinearGradient(0, 0, 0, 250);
			barLoginPrevious2gradientStroke.addColorStop(0, "rgba(23, 162, 184, 1)");
			barLoginPrevious2gradientStroke.addColorStop(1, "rgba(23, 162, 184, 0.4)");
			barLoginPrevious2.height = 100;

			new Chart(barLoginPrevious2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [<?php foreach($label_previous2 as $value){echo "'".$value."'".',';}?>],
					datasets: [
						{
							label: "ผู้เข้าสู่ระบบ",
							data: [<?php foreach($login_previous2 as $value){echo $value.',';}?>],
							borderColor: barLoginPrevious2gradientStroke,
							borderWidth: "0",
							backgroundColor: barLoginPrevious2gradientStroke, 
							hoverBackgroundColor: barLoginPrevious2gradientStroke
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

	//ลงทะเบียน
	var regis_week = function(){
		//stalked bar chart
		if(jQuery('#regis_week').length > 0 ){
			const regis_week = document.getElementById("regis_week").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = regis_week.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(76, 183, 200, 0.8)");
			barChart_3gradientStroke.addColorStop(1, "rgba(76, 183, 200, 0.5)");

			const barChart_3gradientStroke2 = regis_week.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(255, 164, 72, 0.8)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(255, 164, 72, 0.5)");

			const barChart_3gradientStroke3 = regis_week.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(253, 121, 140, 0.8)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(253, 121, 140, 0.5)");
			
			regis_week.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: [<?php foreach($label_thisweek as $value){echo "'".$value."'".',';}?>],
				datasets: [{
					label: 'Facebook',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke, 
					data: [<?php foreach($regis_week['admin_facebook'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Google',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2, 
					data: [<?php	foreach($regis_week['admin_google'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Email',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3, 
					data: [<?php foreach ($regis_week['admin_email'] as $value){echo "'".$value."'".',';	}?>]
				}]
			};

			new Chart(regis_week, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					}, 
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
							barPercentage: 0.3
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		}
	}

	var regis_previous = function(){
		//stalked bar chart
		if(jQuery('#regis_previous').length > 0 ){
			const regis_previous = document.getElementById("regis_previous").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = regis_previous.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(76, 183, 200, 0.8)");
			barChart_3gradientStroke.addColorStop(1, "rgba(76, 183, 200, 0.5)");

			const barChart_3gradientStroke2 = regis_previous.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(255, 164, 72, 0.8)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(255, 164, 72, 0.5)");

			const barChart_3gradientStroke3 = regis_previous.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(253, 121, 140, 0.8)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(253, 121, 140, 0.5)");
			
			regis_previous.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: [<?php foreach($label_previous as $value){echo "'".$value."'".',';}?>],
				datasets: [{
					label: 'Facebook',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke, 
					data: [<?php foreach($regis_previous['admin_facebook'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Google',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2, 
					data: [<?php foreach($regis_previous['admin_google'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Email',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3, 
					data: [<?php foreach($regis_previous['admin_email'] as $value){echo "'".$value."'".',';}?>]
				}]
			};

			new Chart(regis_previous, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					}, 
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
							barPercentage: 0.3
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		}
	}

	var regis_previous2 = function(){
		//stalked bar chart
		if(jQuery('#regis_previous2').length > 0 ){
			const regis_previous2 = document.getElementById("regis_previous2").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = regis_previous2.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(76, 183, 200, 0.8)");
			barChart_3gradientStroke.addColorStop(1, "rgba(76, 183, 200, 0.5)");

			const barChart_3gradientStroke2 = regis_previous2.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(255, 164, 72, 0.8)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(255, 164, 72, 0.5)");

			const barChart_3gradientStroke3 = regis_previous2.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(253, 121, 140, 0.8)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(253, 121, 140, 0.5)");
			
			regis_previous2.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: [<?php foreach ($label_previous2 as $value){echo "'".$value."'".',';}?>],
				datasets: [{
					label: 'Facebook',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke, 
					data: [<?php foreach ($regis_previous2['admin_facebook'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Google',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2, 
					data: [<?php foreach ($regis_previous2['admin_google'] as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'Email',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3, 
					data: [<?php foreach ($regis_previous2['admin_email'] as $value){echo "'".$value."'".',';}?>]
				}]
			};

			new Chart(regis_previous2, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					}, 
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
							barPercentage: 0.5
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		}
	}

	//ลงทะเบียนใช้งานแต่ละเดือน
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
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ลงทะเบียน",
							data: [<?php foreach ($account_month as $value) { echo $value.',';}?>],
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
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.4
						}]
					}
				}
			});
		}
	}

	var barUsersMonthcount = function(){
		if(jQuery('#barUsersMonthcount').length > 0 ){

		//gradient bar chart
			const barUsersMonthcount = document.getElementById("barUsersMonthcount").getContext('2d');
			//generate gradient
			const barUsersMonthcountgradientStroke = barUsersMonthcount.createLinearGradient(0, 0, 0, 250);
			barUsersMonthcountgradientStroke.addColorStop(0, "rgba(55, 209, 89, 1)");
			barUsersMonthcountgradientStroke.addColorStop(1, "rgba(55, 209, 89, 0.5)");

			barUsersMonthcount.height = 100;

			new Chart(barUsersMonthcount, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ผู้สมัคร",
							data: [<?php foreach ($account_month_all as $value) {	echo $value.','; }?>],
							borderColor: barUsersMonthcountgradientStroke,
							borderWidth: "0",
							backgroundColor: barUsersMonthcountgradientStroke, 
							hoverBackgroundColor: barUsersMonthcountgradientStroke
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
							barPercentage: 0.4
						}]
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
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "ผู้ใช้งาน",
							data: [<?php foreach ($users_month_all as $value){echo $value.',';}?>],
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
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.4
						}]
					}
				}
			});
		}
	}


	var CommentAllChart = function(){
		//stalked bar chart
		if(jQuery('#CommentAllChart').length > 0 ){
			const CommentAllChart = document.getElementById("CommentAllChart").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = CommentAllChart.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(76, 183, 200, 0.8)");
			barChart_3gradientStroke.addColorStop(1, "rgba(76, 183, 200, 0.5)");

			const barChart_3gradientStroke2 = CommentAllChart.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(255, 195, 104, 0.8)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(255, 195, 104, 0.5)");

			const barChart_3gradientStroke3 = CommentAllChart.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(95, 219, 123, 0.8)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(95, 219, 123, 0.5)");
			
			CommentAllChart.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
				datasets: [{
					label: 'แอดมิน',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke, 
					data: [<?php foreach($month_comment_admin as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'ผู้แจ้งซ่อม',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2, 
					data: [<?php	foreach($month_comment_emp1 as $value){echo "'".$value."'".',';}?>]
				}, {
					label: 'นายช่าง',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3, 
					data: [<?php foreach ($month_comment_emp2 as $value){echo "'".$value."'".',';	}?>]
				}]
			};

			new Chart(CommentAllChart, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					}, 
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							stacked: true,
							barPercentage: 0.4
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
		}
	}

	var barChartMonth = function(){
		if(jQuery('#barChartMonth').length > 0 ){

		//gradient bar chart
			const barChartMonth = document.getElementById("barChartMonth").getContext('2d');
			//generate gradient
			const barChartMonthgradientStroke = barChartMonth.createLinearGradient(0, 0, 0, 250);
			barChartMonthgradientStroke.addColorStop(0, "rgba(209, 61, 69, 1)");
			barChartMonthgradientStroke.addColorStop(1, "rgba(209, 61, 69, 0.5)");

			barChartMonth.height = 100;

			new Chart(barChartMonth, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ['Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.'],
					datasets: [
						{
							label: "คำแนะนำ/ติชม",
							data: 	[<?php foreach ($month_comment_all as $value) {	echo $value.',';}?>],
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
							barPercentage: 0.4
						}]
					}
				}
			});
		}
	}

	var overallProgram = function(){
		var options = {
		  series: [<?php echo round($percent_program);?>],
		  chart: {
		  height: 180,
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

		var chart = new ApexCharts(document.querySelector("#overallProgram"), options);
		chart.render();
	}


	/* Function ============ */
	return {
		init:function(){
		},
		load:function(){
			barLoginWeek();	
			barLoginPrevious();
			barLoginPrevious2();
			regis_week();
			regis_previous();
			regis_previous2();
			barAccountMonth();
			barUsersMonthcount();
			barUsersMonth();
			CommentAllChart();
			barChartMonth();
			overallProgram();
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