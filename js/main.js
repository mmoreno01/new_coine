$(document).ready(function(){ 

    /*************************************************Guatemala******************************************************/    
       Highcharts.chart('container-guatemala', {
            chart: {
            scrollablePlotArea: {
                minWidth: 1000
            }
        },
    
        data: {
            csvURL: 'http://www.coine.lat/data/com-guatemala.csv',
            beforeParse: function (csv) {
                return csv.replace(/\n\n/g, '\n');
            }
        },
    
        title: {
            text: 'Comercio con Gatemala'
        },
    
        subtitle: {
            text: 'Datos en millones de dólares'
        },
        annotations: [{
            labelOptions: {
                backgroundColor: 'rgba(255,255,255,0.5)',
                verticalAlign: 'top',
                y: 15
            },
            labels: [{
                point: {
                    xAxis: 0,
                    yAxis: 0,
                    x: 2013,
                    y: 1734
                },
                text: 'Exportaciones; Creciemineto:32% Tasa media anual:3%'
            }, {
                point: {
                    xAxis: 0,
                    yAxis: 0,
                    x: 2013,
                    y: 528.8
                },
                text: 'Importaciones; Creciemineto:7% Tasa media anual:1%'
            },{
                point: {
                    xAxis: 0,
                    yAxis: 0,
                    x: 2013,
                    y: 1205
                },
                text: 'Balance comercial; Creciemineto:61% Tasa media anual:5%'
            },{
                point: {
                    xAxis: 0,
                    yAxis: 0,
                    x: 2013,
                    y: 2263
                },
                text: 'Comercio total; Creciemineto:32% Tasa media anual:3%'
            }]
        }],
     
        
           
    
        xAxis: {
            //tickInterval: 7 * 24 * 3600 * 1000, // one week
            tickInterval: 1,
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },
    
        yAxis: [{ // left y axis
            title: {
                text: null
            },
            resize: {
                enabled: true
              },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }, 
        
        { // right y axis
            linkedTo: 0,
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: null
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }],
    
        legend: {
            align: 'left',
            verticalAlign: 'top',
            borderWidth: 0
        },
    
        tooltip: {
            shared: true,
            crosshairs: true
        },
        
     
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                            hs.htmlExpand(null, {
                                pageOrigin: {
                                    x: e.pageX || e.clientX,
                                    y: e.pageY || e.clientY
                                },
                                headingText: this.series.name,
                                maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                    this.y + ' sessions',
                                width: 200
                            });
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },
    
    });
    
    /*************************************************Peru******************************************************/
    Highcharts.chart('container-peru', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-peru.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Perú'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 974
            },
            text: 'Exportaciones; Creciemineto:40% Tasa media anual:3%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 440
            },
            text: 'Importaciones; Creciemineto:12% Tasa media anual:1%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2016,
                y: 848
            },
            text: 'Balance comercial; Creciemineto:33% Tasa media anual:3%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2016,
                y: 1960
            },
            text: 'Comercio total; Creciemineto:55% Tasa media anual:5%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    
    /*************************************************Salvador******************************************************/
    Highcharts.chart('container-salvador', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-salvador.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con el Salvador'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 658
            },
            text: 'Exportaciones; Creciemineto:-1% Tasa media anual:0%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 110
            },
            text: 'Importaciones; Creciemineto:250% Tasa media anual:13%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2015,
                y: 773
            },
            text: 'Comercio total; Creciemineto:19% Tasa media anual:2%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 513
            },
            text: 'Balance comercial; Creciemineto:-25% Tasa media anual:-3%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Panama******************************************************/
    Highcharts.chart('container-panama', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-panama.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Panamá'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 882
            },
            text: 'Exportaciones; Creciemineto:34% Tasa media anual:3%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 121
            },
            text: 'Importaciones; Creciemineto:-9% Tasa media anual:-1%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 1219
            },
            text: 'Comercio total; Creciemineto:29% Tasa media anual:3%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 1029
            },
            text: 'Balance comercial; Creciemineto:41% Tasa media anual:4%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Nicaragua******************************************************/
    Highcharts.chart('container-nicaragua', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-nicaragua.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Nicaragua'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2015,
                y: 942
            },
            text: 'Exportaciones; Creciemineto:98% Tasa media anual:7%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 628
            },
            text: 'Importaciones; Creciemineto:179% Tasa media anual:11%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 1408
            },
            text: 'Comercio total; Creciemineto:117% Tasa media anual:8%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2015,
                y: 392
            },
            text: 'Balance comercial; Creciemineto:59% Tasa media anual:5%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Honduras******************************************************/
    Highcharts.chart('container-honduras', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-honduras.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Honduras'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 424
            },
            text: 'Exportaciones; Creciemineto:62% Tasa media anual:5%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 418
            },
            text: 'Importaciones; Creciemineto:71% Tasa media anual:6%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 927
            },
            text: 'Comercio total; Creciemineto:65% Tasa media anual:5%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 132
            },
            text: 'Balance comercial; Creciemineto:50% Tasa media anual:4%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Ecuador******************************************************/
    Highcharts.chart('container-ecuador', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-ecuador.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Ecuador'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 698
            },
            text: 'Exportaciones; Creciemineto:11% Tasa media anual:1%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 129
            },
            text: 'Importaciones; Creciemineto:2% Tasa media anual:0%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 986
            },
            text: 'Comercio total; Creciemineto:9% Tasa media anual:1%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 802
            },
            text: 'Balance comercial; Creciemineto:14% Tasa media anual:1%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Rep Dominicana******************************************************/
    Highcharts.chart('container-dominicana', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-dominicana.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con República Dominicana'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 782
            },
            text: 'Exportaciones; Creciemineto:-31% Tasa media anual:-4%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 145
            },
            text: 'Importaciones; Creciemineto:19% Tasa media anual:2%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 1013
            },
            text: 'Comercio total; Creciemineto:-24% Tasa media anual:-3%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 880
            },
            text: 'Balance comercial; Creciemineto:-40% Tasa media anual:-5%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    
    /*************************************************Costa Rica******************************************************/
    Highcharts.chart('container-costarica', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-costarica.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Costa Rica'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 806
            },
            text: 'Exportaciones; Creciemineto:5% Tasa media anual:0%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 2650
            },
            text: 'Importaciones; Creciemineto:-44% Tasa media anual:-6%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 4253
            },
            text: 'Comercio total; Creciemineto:-17% Tasa media anual:-2%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2015,
                y: 414
            },
            text: 'Balance comercial; Creciemineto:-270% Tasa media anual:-14%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    
    /*************************************************Colombia******************************************************/
    Highcharts.chart('container-colombia', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-colombia.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Colombia'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 3757
            },
            text: 'Exportaciones; Creciemineto:17% Tasa media anual:2%'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 825
            },
            text: 'Importaciones; Creciemineto:65% Tasa media anual:5%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 6469
            },
            text: 'Comercio total; Creciemineto:30% Tasa media anual:3%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 3823
            },
            text: 'Balance comercial; Creciemineto:-10% Tasa media anual:-1%'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Chile******************************************************/
    Highcharts.chart('container-chile', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-chile.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Chile'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 1863
            },
            text: 'Exportaciones; Creciemineto:31% Tasa media anual:3'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2015,
                y: 1480
            },
            text: 'Importaciones; Creciemineto:-36% Tasa media anual:4%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 3754
            },
            text: 'Comercio total; Creciemineto:-10% Tasa media anual:-1%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 646
            },
            text: 'Balance comercial; Creciemineto:-140% Tasa media anual: No aplica'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    /*************************************************Brasil******************************************************/
    Highcharts.chart('container-brasil', {
        chart: {
        scrollablePlotArea: {
            minWidth: 1000
        }
    },
    
    data: {
        csvURL: 'http://www.coine.lat/data/com-brasil.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },
    
    title: {
        text: 'Comercio con Brasil'
    },
    
    subtitle: {
        text: 'Datos en millones de dólares'
    },
    annotations: [{
        labelOptions: {
            backgroundColor: 'rgba(255,255,255,0.5)',
            verticalAlign: 'top',
            y: 15
        },
        labels: [{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2010,
                y: 3781
            },
            text: 'Exportaciones; Creciemineto:31% Tasa media anual:3'
        }, {
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2011,
                y: 4562
            },
            text: 'Importaciones; Creciemineto:26% Tasa media anual:2%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2012,
                y: 10152
            },
            text: 'Comercio total; Creciemineto:28% Tasa media anual:2%'
        },{
            point: {
                xAxis: 0,
                yAxis: 0,
                x: 2013,
                y: 966
            },
            text: 'Balance comercial; Creciemineto:16% Tasa media anual:1'
        }]
    }],
    
    
       
    
    xAxis: {
        //tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickInterval: 1,
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },
    
    yAxis: [{ // left y axis
        title: {
            text: null
        },
        resize: {
            enabled: true
          },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, 
    
    { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],
    
    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },
    
    tooltip: {
        shared: true,
        crosshairs: true
    },
    
    
    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },
    
    });
    })