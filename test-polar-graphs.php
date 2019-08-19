<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>
  
  <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
Plotly.d3.csv('https://raw.githubusercontent.com/plotly/datasets/master/polar_dataset.csv', function(err, rows){
      function unpack(rows, key) {
          return rows.map(function(row) { return row[key]; });
      }
  
var trace1 = {
  r: unpack(rows, 'x1'),
  theta: unpack(rows, 'y'),
  mode: 'lines',
  name: 'Figure8',
  line: {color: 'peru'},
  type: 'scatterpolar'
};

var trace2 = {
  r: unpack(rows, 'x2'),
  theta: unpack(rows, 'y'),
  mode: 'lines',
  name: 'Cardioid',
  line: {color: 'darkviolet'},
  type: 'scatterpolar'
};

var trace3 = {
  r: unpack(rows, 'x3'),
  theta: unpack(rows, 'y'),
  mode: 'lines',
  name: 'Hypercardioid',
  line: {color: 'deepskyblue'},
  type: 'scatterpolar'
};

var trace4 = {
  
  r: unpack(rows, 'x4'),
  theta: unpack(rows, 'y'),
  mode: 'lines',
  name: 'Subcardioid',
  line: {color: 'orangered'},
  type: 'scatterpolar'
};

var trace5 = {

  r: unpack(rows, 'x5'),
  theta: unpack(rows, 'y'),
  mode: 'lines',
  name: 'Supercardioid',
  marker: {
    color: 'none',
    line: {color: 'green'}
  },
  type: 'scatterpolar'
};

var data = [trace1, trace2, trace3, trace4, trace5];

var layout = {
  title: 'Mic Patterns',
  font: {
    family: 'Arial, sans-serif;',
    size: 12,
    color: '#000'
  },
  showlegend: true,
  orientation: -90
};
Plotly.plot('myDiv', data, layout, {showSendToCloud: true});
});
  </script>

	
	<div id="myDiv2"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
    var data = [
    {
      type: "scatterpolar",
      name: "angular categories",
      r: [5, 4, 2, 4, 5],
      theta: ["a", "b", "c", "d", "a"],
      fill: "toself"
    },
    {
      type: "scatterpolar",
      name: "radial categories",
      r: ["a", "b", "c", "d", "b", "f", "a"],
      theta: [1, 4, 2, 1.5, 1.5, 6, 5],
      thetaunit: "radians",
      fill: "toself",
      subplot: "polar2"
    },
    {
      type: "scatterpolar",
      name: "angular categories (w/ categoryarray)",
      r: [5, 4, 2, 4, 5],
      theta: ["a", "b", "c", "d", "a"],
      fill: "toself",
      subplot: "polar3"
    },
    {
      type: "scatterpolar",
      name: "radial categories (w/ category descending)",
      r: ["a", "b", "c", "d", "b", "f", "a", "a"],
      theta: [45, 90, 180, 200, 300, 15, 20, 45],
      fill: "toself",
      subplot: "polar4"
    },
    {
      type: "scatterpolar",
      name: "angular categories (w/ extra category)",
      r: [5, 4, 2, 4, 5, 5],
      theta: ["b", "c", "d", "e", "a", "b"],
      fill: "toself"
    }
  ]

var layout = {
     showlegend: false,
    polar: {
      domain: {
        x: [0, 0.46],
        y: [0.56, 1]
      },
      radialaxis: {
        angle: 45
      },
      angularaxis: {
        direction: "clockwise",
        period: 6
      }
    },
    polar2: {
      domain: {
        x: [0, 0.46],
        y: [0, 0.44]
      },
      radialaxis: {
        angle: 180,
        tickangle: -180
      }
    },
    polar3: {
      domain: {
        x: [0.54, 1],
        y: [0.56, 1]
      },
      sector: [150, 400],
      radialaxis: {
        angle: -45
      },
      angularaxis: {
        categoryarray: ["d", "a", "c", "b"]
      }
    },
    polar4: {
      domain: {
        x: [0.54, 1],
        y: [0, 0.44]
      },
      radialaxis: {
        categoryorder: "category descending"
      },
      angularaxis: {
        thetaunit: "radians",
        dtick: 0.3141592653589793
      }
    }
  }

Plotly.newPlot('myDiv2', data, layout, {showSendToCloud: true})
  </script>
	
	  <div id="myDiv3"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
    var data = [
    {
      type: "scatterpolar",
      mode: "lines+markers",
      r: [1,2,3,4,5],
      theta: [0,90,180,360,0],
      line: {
        color: "#ff66ab"
      },
      marker: {
        color: "#8090c7",
        symbol: "square",
        size: 8
      },
      subplot: "polar"
    },
    {
      type: "scatterpolar",
      mode: "lines+markers",
      r: [1,2,3,4,5],
      theta: [0,90,180,360,0],
      line: {
        color: "#ff66ab"
      },
      marker: {
        color: "#8090c7",
        symbol: "square",
        size: 8
      },
      subplot: "polar2"
    }
  ]

var layout = {
    showlegend: false,
    polar: {
      domain: {
        x: [0,0.4],
        y: [0,1]
      },
      radialaxis: {
        tickfont: {
          size: 8
        }
      },
      angularaxis: {
        tickfont: {
          size: 8
        },
        rotation: 90,
        direction: "counterclockwise"
      }
    },
    polar2: {
      domain: {
        x: [0.6,1],
        y: [0,1]
      },
      radialaxis: {
        tickfont: {
          size: 8
        }
      },
      angularaxis: {
        tickfont: {
          size: 8
        },
        direction: "clockwise"
      }
    }
  }

Plotly.plot('myDiv3', data, layout, {showSendToCloud: true})
  </script>
</body>