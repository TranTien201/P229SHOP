$(function () {

	var options = {
		series: [44, 55, 41, 17, 15],
		chart: {
			foreColor: 'rgba(255, 255, 255, 0.65)',
			height: 380,
			type: 'donut',
			colors : '#000'
		},
		colors: ["#DADADC", "#E7E7DC", "#E1D7CD", "#D4E2EF", "#E1E2E4"],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 320
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart3"), options);
	chart.render();

      
	
});