

(function($) {
    /* "use strict" */
	
 var dzChartlist = function(){
	
	var screenWidth = $(window).width();	
	
	var radialChart = function(){
		var options = {
		  series: [70],
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

		var chart = new ApexCharts(document.querySelector("#radialChart"), options);
		chart.render();
	}
	var radialChart1 = function(){
		var options = {
		  series: [70],
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
	var radialChart2 = function(){
		var options = {
		  series: [70],
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

		var chart = new ApexCharts(document.querySelector("#radialChart2"), options);
		chart.render();
	}
	var radialChart3 = function(){
		var options = {
		  series: [70],
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

		var chart = new ApexCharts(document.querySelector("#radialChart3"), options);
		chart.render();
	}
	var radialChart4 = function(){
		var options = {
		  series: [70],
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

		var chart = new ApexCharts(document.querySelector("#radialChart4"), options);
		chart.render();
	}
	var radialChart5 = function(){
		var options = {
		  series: [70],
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

		var chart = new ApexCharts(document.querySelector("#radialChart5"), options);
		chart.render();
	}
	var reservationChart = function(){
		 var options = {
          series: [{
          name: 'จำนวนคลิก',
          data: [400, 400, 650, 500, 900, 750, 850 ,600, 950, 500, 650, 700]
        }, {
          name: 'จำนวนการแสดงผล',
          data: [350, 350, 420, 370, 500, 400, 550, 420, 600, 450, 550, 400]
        }],
          chart: {
          height: 250,
          type: 'area',
		  toolbar:{
			  show:false
		  }
        },
		colors:["#4285f4","#5e35b1"],
        dataLabels: {
          enabled: false
        },
        stroke: {
			width:6,
			curve: 'smooth',
        },
		legend:{
			show:false
		},
		grid:{
			borderColor: '#EBEBEB',
			strokeDashArray: 6,
		},
		markers:{
			strokeWidth: 6,
			 hover: {
			  size: 10,
			}
		},
		yaxis: {
		  labels: {
			offsetX:-12,
			style: {
				colors: '#787878',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			}
		  },
		},
        xaxis: {
          categories: ["01/07/65","02/07/65","03/07/65","04/07/65","05/07/65","06/07/65","07/07/65","08/07/65","09/07/65","10/07/65","11/07/65","12/07/65",],
		  labels:{
			  style: {
				colors: '#787878',
				fontSize: '10px',
				fontFamily: 'Poppins',
				fontWeight: 400
				
			},
		  }
        },
		fill:{
			type:"solid",
			opacity:0.1
		},
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#reservationChart"), options);
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
				radialChart();
				radialChart1();
				radialChart2();
				radialChart3();
				radialChart4();
				radialChart5();
				reservationChart();
				donutChart();
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

     

})(jQuery);