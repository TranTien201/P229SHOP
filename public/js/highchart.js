Highcharts.chart('container', {
  chart: {
    type: 'variablepie',
    styledMode: true
  },
  credits: {
    enabled: false
  },
  title: {
    text: 'Graph of sales through the shop channels'
  },
  tooltip: {
    headerFormat: '',
    pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' + 'Revenue $: <b>{point.y}</b><br/>' + 'Sale : <b>{point.z}</b><br/>'
  },
  series: [{
    minPointSize: 10,
    innerSize: '20%',
    zMin: 0,
    data: [{
      name: 'Directly at the store',
      y: 505370,
      z: 92.9
    }, {
      name: 'Website',
      y: 551500,
      z: 118.7
    }, {
      name: 'Facebook',
      y: 312685,
      z: 124.6
    }, {
      name: 'Youtube',
      y: 78867,
      z: 137.5
    }, {
      name: 'Instagram',
      y: 301340,
      z: 201.8
    }, {
      name: 'Twitter',
      y: 41277,
      z: 150.5
    }, ]
  }]
});
Highcharts.chart('chart4', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
    styledMode: true
  },
  credits: {
    enabled: false
  },
  title: {
    text: 'Number of sales by teams'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'Teams',
    colorByPoint: true,
    data: [{
      name: 'Team 1',
      y: 46.5,
      sliced: true,
      selected: true
    }, {
      name: 'Team 2 ',
      y: 33.5
    }, {
      name: 'Team 3',
      y: 22.6
    }, {
      name: 'Team 4',
      y: 35.67
    },  
     {
    }]
  }]
});