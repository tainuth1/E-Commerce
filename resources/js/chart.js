var options = {
    chart: {
        height: 350,
        type: "line",
        toolbar: {
            show: true
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: "smooth"
    },
    series: [
        {
            name: "Products",
            color: '#3D5EE1',
            data: [45, 60, 75, 51, 42, 42, 30]
        },
        {
            name: "Orders",
            color: '#70C4CF',
            data: [24, 48, 56, 32, 34, 52, 25]
        }
    ],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
    }
};

var chart = new ApexCharts(document.querySelector("#chart-area"), options);
chart.render();

// var optionsBar = {
//     chart: {
//         type: 'bar',
//         // height: 350,
//         width: '100%',
//         stacked: false,
//         toolbar: {
//             show: false
//         },
//     },
//     dataLabels: {
//         enabled: false
//     },
//     plotOptions: {
//         bar: {
//             columnWidth: '55%',
//             endingShape: 'rounded'
//         },
//     },
//     stroke: {
//         show: true,
//         width: 2,
//         colors: ['transparent']
//     },
//     series: [
//         {
//             name: "Boys",
//             color: '#70C4CF',
//             data: [420, 532, 516, 575, 519, 517, 454, 392, 262, 383, 446, 551],
//         },
//         {
//             name: "Girls",
//             color: '#3D5EE1',
//             data: [336, 612, 344, 647, 345, 563, 256, 344, 323, 300, 455, 456],
//         }
//     ],
//     labels: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020],
//     xaxis: {
//         labels: {
//             show: false
//         },
//         axisBorder: {
//             show: false
//         },
//         axisTicks: {
//             show: false
//         },
//     },
//     yaxis: {
//         axisBorder: {
//             show: false
//         },
//         axisTicks: {
//             show: false
//         },
//         labels: {
//             style: {
//                 colors: '#777'
//             }
//         }
//     },
//     title: {
//         text: '',
//         align: 'left',
//         style: {
//             fontSize: '18px'
//         }
//     }
// };
// var chartBar = new ApexCharts(document.querySelector('#number-sale'), optionsBar);
// chartBar.render();

var options = {
    series: [44, 55, 67, 83, 40],
    chart: {
    height: 280,
    type: 'radialBar',
  },
  plotOptions: {
    radialBar: {
      dataLabels: {
        name: {
          fontSize: '22px',
        },
        value: {
          fontSize: '16px',
        },
        total: {
          show: true,
          label: 'Total',
          formatter: function (w) {
            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
            return 249
          }
        }
      }
    }
  },
  labels: ['Jan', 'Feb', 'May', 'April', 'Mach'],
  };

  var chart = new ApexCharts(document.querySelector("#radialbar"), options);
  chart.render();