App.Controllers.GoldXpIndexController = Frontend.AppController.extend({
    startup: function() {
        var xAxis = this.getVar('xAxisValues');
        var yAxisValues = this.getVar('yAxisValues');
        var data = this.getVar('allHeroes')
        console.log(data[4])
        var chart = {
              zoomType: 'x'
           };
           var title = {
              text: 'Hero Gold'
           };
           var subtitle = {
              text: document.ontouchstart === undefined ?
                            'Click and drag in the plot area to zoom in' :
                            'Pinch the chart to zoom in'
           };
           var tickInterval = {
               tickInterval: 10000,
           }
           var xAxis = {
              min: 0,
              max: 90000
           };
           var yAxis = {
              title: {
                 text: 'Gold'
              }
           };

//in a loop
           var series= [
                {
                    type: 'line',
                    name: data[0]['hero_name'],
                    pointStart: 0,
                    data: data[0]['gold_data']
                },
                {
                    type: 'line',
                    name: data[1]['hero_name'],
                    pointStart: 0,
                    data: data[1]['gold_data']
                },
                {
                    type: 'line',
                    name: data[2]['hero_name'],
                    pointStart: 0,
                    data: data[2]['gold_data']
                },
                {
                    type: 'line',
                    name: data[3]['hero_name'],
                    pointStart: 0,
                    data: data[3]['gold_data']
                },
                {
                    type: 'line',
                    name: data[4]['hero_name'],
                    pointStart: 0,
                    data: data[4]['gold_data']
                },
                {
                    type: 'line',
                    name: data[5]['hero_name'],
                    pointStart: 0,
                    data: data[5]['gold_data']
                },
                {
                    type: 'line',
                    name: data[6]['hero_name'],
                    pointStart: 0,
                    data: data[6]['gold_data']
                },
                {
                    type: 'line',
                    name: data[7]['hero_name'],
                    pointStart: 0,
                    data: data[7]['gold_data']
                },
                {
                    type: 'line',
                    name: data[8]['hero_name'],
                    pointStart: 0,
                    data: data[8]['gold_data']
                },
                {
                    type: 'line',
                    name: data[9]['hero_name'],
                    pointStart: 0,
                    data: data[9]['gold_data']
                }
            ];

           var json = {};
           json.chart = chart;
           json.title = title;
           json.tickInterval = tickInterval;
           json.subtitle = subtitle;
           json.xAxis = xAxis;
           json.yAxis = yAxis;
           json.series = series;
        //    json.plotOptions = plotOptions;
           $('#gold-xp-container').highcharts(json);
    }
});
