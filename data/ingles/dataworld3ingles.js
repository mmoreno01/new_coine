$(document).ready(function(){ 
//Gustemala

Highcharts.chart('container-guatemala', {
  chart: {
      zoomType: 'xy'
  },
  credits: {
    text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy. ',
  },
  title: {
      text: 'México is trade with Guatemala',
      align: 'center'
  },
  subtitle: {
      text: 'Amount in million USD',
      align: 'center'
  },
  yAxis: [{ // Primary yAxis
      labels: {
          style: {
              color: Highcharts.getOptions().colors[1]
          }
      },
      title: {
          text: 'Million USD',
          style: {
              color: Highcharts.getOptions().colors[1]
          }
      },

  },  { // Second yAxis
      gridLineWidth: 0,
      title: {
          text: 'IED in million USD',
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
        text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
  data: {    csvURL: 'http://www.coine.lat/data/ingles/com-guatemala.csv',
             beforeParse: function (csv) {
                 return csv.replace(/\n\n/g, '\n');
             }           
         },
  series: [{
      name: 'Exports',
      type: 'column',
     // yAxis: 1,
      tooltip: {
          valueSuffix: ' mdd'
      }
  }, {
      name: 'Imports',
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
      name: 'Total trade',
      type: 'column',
      tooltip: {
          valueSuffix: ' mdd'
      }
  },
  {
    name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    
    title: {
        text: 'México is trade with Chile',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-chile.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Colombia',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-colombia.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Costa Rica',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-costarica.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with República Dominicana',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-dominicana.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Ecuador',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-ecuador.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Honduras',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-honduras.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Nicaragua',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-nicaragua.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Panama',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-panama.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Perú',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-peru.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with El Salvador',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-salvador.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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
        text: 'IED = Foreign Direct Investment. Data provided by the  . The years that do not have values ​​for FDI correspond to confidential information according to the Ministry of Economy.',
    },
    title: {
        text: 'México is trade with Brasil',
        align: 'center'
    },
    subtitle: {
        text: 'Amount in million USD',
        align: 'center'
    },
    yAxis: [{ // Primary yAxis
        labels: {
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Million USD',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
  
    },  { // Second yAxis
        gridLineWidth: 0,
        title: {
            text: 'IED in million USD',
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
          text: 'Type<br/><span style="font-size: 9px; color: #666; font-weight: normal">(Click to hide)</span>',
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
    data: {    csvURL: 'http://www.coine.lat/data/ingles/com-brasil.csv',
               beforeParse: function (csv) {
                   return csv.replace(/\n\n/g, '\n');
               }           
           },
    series: [{
        name: 'Exports',
        type: 'column',
       // yAxis: 1,
        tooltip: {
            valueSuffix: ' mdd'
        }
    }, {
        name: 'Imports',
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
        name: 'Total trade',
        type: 'column',
        tooltip: {
            valueSuffix: ' mdd'
        }
    },
    {
      name: 'Trade balance',
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