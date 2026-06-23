
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ['January','February','March','April','May','June','July','August','September','October', 'November', 'December'],
        datasets: [{
            label: "Total Number of Processed Documents",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#ff8902ff",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [1,2,3,4,6,5,7,10,15,11,7,4],
            maxBarThickness: 6
          },
          {
            label: "Approved",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "green",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [4,7,5,5,6,6,7,8,9,11,10,15],
            maxBarThickness: 6
          },
          {
            label: "Rejected",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "red",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [0,1,1,1,2,0,0,0,0,1,2,1],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });