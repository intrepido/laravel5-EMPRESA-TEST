$(document).ready(function () {
    //Menu lateral izquierdo de la pagina de administracion
    $("#menu").metisMenu();

    /****************************
     * Graph Users vs Employees
     ****************************/
    var series;
    $.get('/admin/user/get_users_employee_total', function(data){
        series = [{name: "Total",
                  colorByPoint: true,
                  data:[{
                      name: 'Employees',
                      y: data.employees
                  },{
                      name: 'Common Users',
                      y: data.users
                  }]
        }];
        // Build the chart
        $('#graph-user-employee').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Users by type'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: series
        });
    });

    /********************************
     * Graph Divitions vs Departents
     ********************************/

    $.get('/admin/user/get_total_department_by_divitions', function(datas){

        var data = new Array();
        $.each(datas.divDepArray, function (key, value) {
            data.push({name: key, y: value.length});
        });

        var series = [{name: "Total", colorByPoint: true, data : data}];

        $('#graph-divitions-department').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Departments by Divitions'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Departments'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:1f}'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> of total<br/>'
            },
            series: series
        });
    });




});
//# sourceMappingURL=graphics.js.map