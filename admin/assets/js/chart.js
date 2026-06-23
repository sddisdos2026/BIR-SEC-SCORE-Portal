
const xValues = ['January','February','March','April','May','June','July','August','September','October', 'November', 'December'];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [1,2,3,4,6,5,7,10,15,11,7,4],
      borderColor: "blue",
      fill: false,
      label: "Total Number of Processed Documents"
    }, { 
      data: [4,7,5,5,6,6,7,8,9,11,10,15],
      borderColor: "green",
      fill: false,
      label: "Approved"
    }, { 
      data: [0,1,1,1,2,0,0,0,0,1,2,1],
      borderColor: "red",
      fill: false,
      label: "Rejected"
    }]
  },
  options: {
    legend: {display: false}
  }
});

