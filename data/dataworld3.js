$(document).ready(function(){ 
//Gustemala

Highcharts.chart('container-guatemala', {
  chart: {
      zoomType: 'xy'
  },
  credits: {
    text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía.  ',
  },
  title: {
      text: 'Comercio de México con Guatemala',
      align: 'center'
  },
  subtitle: {
      text: 'Datos en millones de dólares',
      align: 'center'
  },
  yAxis: [{ // Primary yAxis
      labels: {
          style: {
              color: Highcharts.getOptions().colors[1]
          }
      },
      title: {
          text: 'Millones de dolares',
          style: {
              color: Highcharts.getOptions().colors[1]
          }
      },

  },  { // Second yAxis
      gridLineWidth: 0,
      title: {
          text: 'IED Millones de dolares',
          style: {
            color: '#e013f5 ',
          }
      },
      labels: {
          style: {
            color: '#e013f5 ',
          }
      },
      opposite: true
  }],
  tooltip: {
      shared: true
  },
  legend: {
    title: {
        text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
        style: {
            fontStyle: 'italic'
        }
    },
    borderWidth: 2,
    layout: 'vertical',
    align: 'left',
    x: 20,
    verticalAlign: 'top',
    y: 100,
    //floating: true,
    padding: 12,
    itemMarginTop: 5,
    itemMarginBottom: 5,
      backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
  },
  data: {    csvURL: 'http://www.coine.lat/data/com-guatemala.csv',
             beforeParse: function (csv) {
                 return csv.replace(/\n\n/g, '\n');
             }           
         },
  series: [{
      name: 'Exportaciones',
      type: 'column',
     // yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  }, {
      name: 'Importaciones',
      type: 'column',
     // yAxis: 2,
      marker: {
          enabled: false
      },
     //dashStyle: 'shortdot',
      tooltip: {
          valueSuffix: ' mdd'
      }

  }, {
      name: 'Comercio total',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
    name: 'Balanza comercial',
    type: 'column',
    tooltip: {
        valueSuffix: ' mdd'
    }
},
{
    name: 'IED',
    type: 'spline',
    color: '#e013f5',
    yAxis: 1,
    tooltip: {
        valueSuffix: ' mdd'
    }
},
],
responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  floating: false,
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  x: 0,
                  y: 0
              }
          }
      }]
  }
});

//Chile

Highcharts.chart('container-chile', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    
    title: {
        text: 'Comercio de México con Chile',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-chile.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


  //Colombia

Highcharts.chart('container-colombia', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Colombia',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-colombia.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });

//Costarica

Highcharts.chart('container-costarica', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Costa Rica',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-costarica.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });

//Republica Dominicana

Highcharts.chart('container-dominicana', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con República Dominicana',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-dominicana.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });

//Ecuador

Highcharts.chart('container-ecuador', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Ecuador',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-ecuador.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


//honduras
Highcharts.chart('container-honduras', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Honduras',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-honduras.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


//Nicaragua

Highcharts.chart('container-nicaragua', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Nicaragua',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-nicaragua.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });

//Panama

Highcharts.chart('container-panama', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Panama',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-panama.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });

//Peru

Highcharts.chart('container-peru', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Perú',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-peru.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


//El salvador

Highcharts.chart('container-salvador', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con El Salvador',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-salvador.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


//Brasil

Highcharts.chart('container-brasil', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio de México con Brasil',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-brasil.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


//Mexico

Highcharts.chart('container-mexico', {
    chart: {
        zoomType: 'xy'
    },
    credits: {
        text: 'IED = Inversión Extranjera Directa. Datos proporcionados por la Secretaría de Economía. Los años que no cuentan con valores para la IED, corresponden a información confidencial de acuerdo con la Secretaría de Economía',
    },
    title: {
        text: 'Comercio total de México con el mundo',
        align: 'center'
    },
    subtitle: {
        text: 'Datos en millones de dólares',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Millones de dolares',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED Millones de dolares',
            style: {
              color: '#e013f5 ',
            }
        },
        labels: {
            style: {
              color: '#e013f5 ',
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
      title: {
          text: 'Datos<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click para ocultar)</span>',
          style: {
              fontStyle: 'italic'
          }
      },
      borderWidth: 2,
      layout: 'vertical',
      align: 'left',
      x: 20,
      verticalAlign: 'top',
      y: 100,
      //floating: true,
      padding: 12,
      itemMarginTop: 5,
      itemMarginBottom: 5,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    },
    data: {    csvURL: 'http://www.coine.lat/data/com-mexico.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exportaciones',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Importaciones',
        type: 'column',
       // yAxis: 2,
        marker: {
            enabled: false
        },
       //dashStyle: 'shortdot',
        tooltip: {
            valueSuffix: ' mdd'
        }
  
    }, {
        name: 'Comercio total',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Balanza comercial',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
      name: 'IED',
      type: 'spline',
      color: '#e013f5',
      yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  ],
  responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    floating: false,
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    x: 0,
                    y: 0
                }
            }
        }]
    }
  });


})