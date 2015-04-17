$(document).ready(function(){
	// Build the chart
			// obj = jQuery.parseJSON(data);
	        var options = {
                chart: {
                    renderTo: 'pie-container',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Product Orders Distribution'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                            },

                        },
                         showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: []
                }]
            }
            
            $.getJSON(base_url + "analytics/product_order_distribution/1_month", function(json) {
            	// console.log(json);
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
});
$('.filter').click(function(){
	process_ajax('analytics/get_order_data/' + $(this).attr('data-range'), function(data){
		obj = jQuery.parseJSON(data);
		$('#container').highcharts({
			chart: {
	            type: 'areaspline',
	            backgroundColor: '#f2f2f2'
	        },
			title: {
				text: 'Orders between ' + obj.range.from + ' to ' + obj.range.to,
				x: -20 //center
			},
			subtitle: {
				text: 'Orders made through the system',
				x: -20
			},
			xAxis: {
				categories: obj.graph_data.labels
			},
			yAxis: {
				title: {
					text: 'Order Numbers'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				valueSuffix: 'Orders'
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				name: 'orders',
				data: obj.graph_data.datasets.data
			}]
		});
	});
});