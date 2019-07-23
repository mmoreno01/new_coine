$(document).ready(function(){ 

    /*************************************************Guatemala******************************************************/    
       Highcharts.chart('container-guatemala', {
            chart: {
            scrollablePlotArea: {
                minWidth: 1000
            }
        },
    
        data: {
            csvURL: 'http://bdrex1.test/new_coine/data/com-guatemala.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-peru.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-salvador.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-panama.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-nicaragua.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-honduras.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-ecuador.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-dominicana.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-costarica.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-colombia.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-chile.csv',
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
        csvURL: 'http://bdrex1.test/new_coine/data/com-brasil.csv',
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