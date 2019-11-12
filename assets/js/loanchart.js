new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
      datasets: [{ 
          data: [86,114,106,106,107,111,133,221,783,2478],
          label: "Bok",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [282,350,411,502,635,809,947,1402,3700,5267],
          label: "CD",
          borderColor: "#8e5ea2",
          fill: false
        }, { 
          data: [168,170,178,190,203,276,408,547,675,734],
          label: "Ljudbok",
          borderColor: "#3cba9f",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Media popularitet'
      }
    }
  });
  