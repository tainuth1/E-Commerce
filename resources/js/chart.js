// Check for stored theme in localStorage on page load
var isDarkMode = localStorage.getItem('theme') === 'dark';

// Apply the stored theme on page load
if (isDarkMode) {
  document.body.classList.add('dark');
} else {
  document.body.classList.remove('dark');
}

// Define chart variables globally
var lineChart;
var radialChart;

// Function to render the line chart
function renderLineChart(isDarkMode) {
  var options = {
    chart: {
      height: 350,
      type: "line",
      toolbar: {
        show: false
      },
      background: 'transparent'
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
        color: '#1E90FF',
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
    },
    grid: {
      borderColor: isDarkMode ? '#4A5568' : '#d8d8d8'
    },
    theme: {
      mode: isDarkMode ? 'dark' : 'light'
    },
  };

  // Destroy previous chart instance if it exists
  if (lineChart) {
    lineChart.destroy();
  }

  // Render line chart
  lineChart = new ApexCharts(document.querySelector("#chart-area"), options);
  lineChart.render();
}

// Function to render the radial chart
function renderRadialBarChart(isDarkMode) {
  var options = {
    series: [44, 55, 67, 83, 40],
    chart: {
      height: 250,
      type: 'radialBar',
      background: 'transparent'
    },
    plotOptions: {
      radialBar: {
        track: {
          background: isDarkMode ? '#333' : '#eeeeee'
        },
        dataLabels: {
          name: {
            fontSize: '22px',
            color: isDarkMode ? '#fff' : '#333'
          },
          value: {
            fontSize: '16px',
            color: isDarkMode ? '#fff' : '#333'
          },
          total: {
            show: true,
            label: 'Total',
            formatter: function (w) {
              return 249;
            },
            style: {
              fontSize: '16px',
              color: isDarkMode ? '#fff' : '#333'
            }
          }
        }
      }
    },
    theme: {
      mode: isDarkMode ? 'dark' : 'light'
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    stroke: {
      lineCap: 'round',
      colors: ['#3D5EE1', '#70C4CF', '#6D28D9', '#22C55E', '#F59E0B']
    }
  };

  // Destroy previous chart instance if it exists
  if (radialChart) {
    radialChart.destroy();
  }

  // Render radial bar chart
  radialChart = new ApexCharts(document.querySelector("#radialbar"), options);
  radialChart.render();
}

// Initial render based on the current mode
renderLineChart(isDarkMode);
renderRadialBarChart(isDarkMode);

// Event listener for the toggle button
document.getElementById("theme-toggle").addEventListener("click", function() {
  // Toggle the dark mode class on body
  document.body.classList.toggle('dark');

  // Update the isDarkMode variable
  isDarkMode = document.body.classList.contains('dark');

  // Save the user's preference in localStorage
  localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

  // Re-render charts based on the current mode
  renderLineChart(isDarkMode);
  renderRadialBarChart(isDarkMode);
});
