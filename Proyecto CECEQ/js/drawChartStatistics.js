// Old compatibility code, no longer needed.

//google.charts.load("current", {packages:["corechart"]});
//google.charts.setOnLoadCallback(drawChart);
google.charts.load('current', {'packages':['corechart']});
 // Set a callback to run when the Google Visualization API is loaded.
 google.charts.setOnLoadCallback(drawChart);
//console.log("google chart");
//var mod = document.getElementById("extra").value;

function drawChart() {

  var jsonData = $.get({
    url: "consultaEstadistica.php",
    dataType: "json"
    }).responseText;

    console.log(jsonData);
  
    var options = {
      title: 'Lengths of dinosaurs, in meters',
      legend: { position: 'none' },
    };

    var object = {
  cols: [{id: 'A', label: 'NEW A', type: 'string'},
         {id: 'B', label: 'B-label', type: 'number'},
         {id: 'C', label: 'C-label', type: 'date'}
  ],
  rows: [{c:[{v: 'a'},
             {v: 1.0, f: 'One'},
             {v: new Date(2008, 1, 28, 0, 31, 26), f: '2/28/08 12:31 AM'}
        ]},
         {c:[{v: 'b'},
             {v: 2.0, f: 'Two'},
             {v: new Date(2008, 2, 30, 0, 31, 26), f: '3/30/08 12:31 AM'}
        ]},
         {c:[{v: 'c'},
             {v: 3.0, f: 'Three'},
             {v: new Date(2008, 3, 30, 0, 31, 26), f: '4/30/08 12:31 AM'}
        ]}
  ],
  p: {foo: 'hello', bar: 'world!'}
}

  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(object);

  // Instantiate and draw our chart, passing in some options.
  var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
      chart.draw(data, options);

    /*
  $.get("consultaEstadistica.php")
    .done(function(data) {
      console.log("Enviando peticion");
      alert(data);
      return;*/ /*
      //var ddd = jQuery.parseJSON(data);
      
      var datos = google.visualization.arrayToDataTable(data); //Recibe los datos
      console.log("Datos recibidos");
      console.log(data);

      var options = {
        title: 'Titulo',
        legend: { position: 'none' },
      };
      
      var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
      chart.draw(datos, options);*/

    //});
    /*
var data = google.visualization.arrayToDataTable([
  ['Dinosaur', 'Length'],
  ['Acrocanthosaurus (top-spined lizard)',12],
  ['Albertosaurus (Alberta lizard)', 9.1],
  ['Allosaurus (other lizard)', 12.2],
  ['Apatosaurus (deceptive lizard)', 22.9],
  ['Archaeopteryx (ancient wing)', 0.9],
  ['Argentinosaurus (Argentina lizard)', 36.6],
  ['Baryonyx (heavy claws)', 9.1],
  ['Brachiosaurus (arm lizard)', 30.5],
  ['Ceratosaurus (horned lizard)', 6.1],
  ['Coelophysis (hollow form)', 2.7],
  ['Compsognathus (elegant jaw)', 0.9],
  ['Deinonychus (terrible claw)', 2.7],
  ['Diplodocus (double beam)', 27.1],
  ['Dromicelomimus (emu mimic)', 3.4],
  ['Gallimimus (fowl mimic)', 5.5],
  ['Mamenchisaurus (Mamenchi lizard)', 21.0],
  ['Megalosaurus (big lizard)', 7.9],
  ['Microvenator (small hunter)', 1.2],
  ['Ornithomimus (bird mimic)', 4.6],
  ['Oviraptor (egg robber)', 1.5],
  ['Plateosaurus (flat lizard)', 7.9],
  ['Sauronithoides (narrow-clawed lizard)', 2.0],
  ['Seismosaurus (tremor lizard)', 45.7],
  ['Spinosaurus (spiny lizard)', 12.2],
  ['Supersaurus (super lizard)', 30.5],
  ['Tyrannosaurus (tyrant lizard)', 15.2],
  ['Ultrasaurus (ultra lizard)', 30.5],
  ['Velociraptor (swift robber)', 1.8]]);*/


}

