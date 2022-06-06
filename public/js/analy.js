$(function() {
    "use strict";
    var options = {
		series: [{
			name: 'Total Orders',
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: 'area',
			height: 65,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.12,
				color: '#fff',
			},
			sparkline: {
				enabled: true
			}
		},
		markers: {
			size: 0,
			colors: ["#fff"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '45%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2.4,
			curve: 'smooth'
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				type: "vertical",
				shadeIntensity: .5,
				gradientToColors: ["#fff"],
				inverseColors: !1,
				opacityFrom: 0.2,	
		     	opacityTo: 0.5,
				stops: [0, 100]
			}
		},
		colors: ["#fff"],
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	};
	var chart = new ApexCharts(document.querySelector(".chart1"), options);
	chart.render();

    var options = {
		series: [{
			name: 'Total Orders',
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: 'area',
			height: 65,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.12,
				color: '#fff',
			},
			sparkline: {
				enabled: true
			}
		},
		markers: {
			size: 0,
			colors: ["#fff"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '45%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2.4,
			curve: 'smooth'
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				type: "vertical",
				shadeIntensity: .5,
				gradientToColors: ["#fff"],
				inverseColors: !1,
				opacityFrom: 0.2,	
		     	opacityTo: 0.5,
				stops: [0, 100]
			}
		},
		colors: ["#fff"],
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	};
	var chart = new ApexCharts(document.querySelector(".chart2"), options);
	chart.render();

    var options = {
		series: [{
			name: 'Total Orders',
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: 'area',
			height: 65,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.12,
				color: '#fff',
			},
			sparkline: {
				enabled: true
			}
		},
		markers: {
			size: 0,
			colors: ["#fff"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '45%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2.4,
			curve: 'smooth'
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				type: "vertical",
				shadeIntensity: .5,
				gradientToColors: ["#fff"],
				inverseColors: !1,
				opacityFrom: 0.2,	
		     	opacityTo: 0.5,
				stops: [0, 100]
			}
		},
		colors: ["#fff"],
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	};
	var chart = new ApexCharts(document.querySelector(".chart3"), options);
	chart.render();

    var options = {
		series: [{
			name: 'Total Orders',
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: 'area',
			height: 65,
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: false,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.12,
				color: '#fff',
			},
			sparkline: {
				enabled: true
			}
		},
		markers: {
			size: 0,
			colors: ["#fff"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '45%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2.4,
			curve: 'smooth'
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				type: "vertical",
				shadeIntensity: .5,
				gradientToColors: ["#fff"],
				inverseColors: !1,
				opacityFrom: 0.2,	
		     	opacityTo: 0.5,
				stops: [0, 100]
			}
		},
		colors: ["#fff"],
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		tooltip: {
			theme: 'dark',
			fixed: {
				enabled: false
			},
			x: {
				show: false
			},
			y: {
				title: {
					formatter: function (seriesName) {
						return ''
					}
				}
			},
			marker: {
				show: false
			}
		}
	};
	var chart = new ApexCharts(document.querySelector(".chart4"), options);
	chart.render();


    var chart_8= document.getElementById('chart8').getContext('2d');
		
    var myChart = new Chart(chart_8, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
            datasets: [{
                label: 'New Customer',
                data: [900, 600, 800, 500, 700, 1200, 600, 900, 600, 600],
                backgroundColor: "rgba(255, 255, 255, 0.5)",
                borderColor: "transparent",
                pointRadius :"0",
                borderWidth: 3
            }, {
                label: 'Old Customer',
                data: [700, 700, 1400, 700, 1100, 500, 1000, 600, 1100, 500],
                backgroundColor: "rgba(255, 255, 255, 0.25)",
                borderColor: "transparent",
                pointRadius :"0",
                borderWidth: 1
            }]
        },
    options: {
        maintainAspectRatio: false,
        legend: {
          display: false,
          labels: {
            fontColor: '#ccc',  
            boxWidth:40
          }
        },
        tooltips: {
          displayColors:false
        },	
      scales: {
          xAxes: [{
            ticks: {
                beginAtZero:true,
                fontColor: '#ccc'
            },
            gridLines: {
              display: true ,
              color: "rgba(221, 221, 221, 0.08)"
            },
          }],
           yAxes: [{
            ticks: {
                beginAtZero:true,
                fontColor: '#ccc'
            },
            gridLines: {
              display: true ,
              color: "rgba(221, 221, 221, 0.08)"
            },
          }]
         }

     }
    }); 
});