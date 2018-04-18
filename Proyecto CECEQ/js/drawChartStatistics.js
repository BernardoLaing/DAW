
////////////////////////////////////////////////////// BOTONES PARA VISUALIZAR Y OCULTAR REPORTES
function main() {
$('.graficas').hide();

$('.graficas-button').on('click', function() {
      $(this).next().toggle();
  if($(this).text() == "Ocultar Reporte"){
      $(this).text("Ver Reporte");
  }
  else{
    $(this).text("Ocultar Reporte");
  }
  });
}
$(document).ready(main);

//////////////////////////////////////////////////// REPORTES
var anio = (new Date()).getFullYear();
var g1;
///////// LIBROS
$(document).ready(function(){ //Estado actual de ejemplares
  $.ajax({
    url: "charts.php",
    data: {method:'obtenerEstados', anioSel: null},
    method: "GET",
    success: function(data) {
      //console.log(data);
      g1=data;
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
       //console.log(data[i].nombre);
       estadoLabels.push(data[i].nombre);
       //console.log(data[i].Cantidad);
        score.push(data[i].Cantidad);
      }

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            label: 'Estados',
            backgroundColor : [
              "#fdf9e1", //amarillo
              "#e5ddea", //morado
              "#e9f4f3", //verde
              "#fdf1f4", //rosa
              "#9ACD32" //Verde mas claro
            ],
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor:  [
              "#faefb1", //amarillo
              "#d9cde0", //morado
              "#c7e3e0", //verde
              "#f7c4d1", //rosa
              "#c1ffdd" //Verde mas claro
            ],
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Estado actual de ejemplares",
					fontSize : 20,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

      var divDoughnutEstado = $("#doughnutEstado");

			var doughnutGraph = new Chart(divDoughnutEstado, {
				type: 'doughnut',
        data: chartdata,
        options : options
      });
    },
    error: function(data) {
     // console.log(data);
      console.log("error");
    }
  });
});

$(document).ready(function(){
  $.ajax({
    url: "charts.php",
    data: {method: 'obtenerCategorias', anioSel: null},
    method: "GET",
    success: function(data) {
    //  console.log(data);
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
      // console.log(data[i].nombre);
       estadoLabels.push(data[i].Generalidades);
      //console.log(data[i].Generalidades);
        score.push(data[i].Cantidad);
       // console.log(data[i].Cantidad);
      }

      var divHistogramaCategoria= $("#histogramaCategoria");

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            backgroundColor: '#4eb7d2', //AZUL
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor: '#30a0bd', //AZUL OSCURO
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Clasificaci\xF3n actual por ejemplar",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

			var chart = new Chart(divHistogramaCategoria, {
				type : "horizontalBar", //line,
				data : chartdata,
				options : options
			});

    },
    error: function(data) {
      //console.log(data);
      console.log("error");
    }
  });
});

///////// VISITANTES
function obtenerEntradas(anio){ //Entradas mensuales
  $.ajax({
    url: "charts.php",
    data: {method: 'obtenerEntradas', anioSel: anio},
    method: "GET",
    success: function(data) {
      //console.log(data);
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
      // console.log(data[i].nombre);
       estadoLabels.push(data[i].Enero);
      // console.log(data[i].Cantidad);
        score.push(data[i].Entradas);
      }

      var divVisitante= $("#visitanteChart");

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            backgroundColor: '#4eb7d2', //AZUL
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor: '#30a0bd', //AZUL OSCURO
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Entradas "+anio,
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

			var chart = new Chart(divVisitante, {
				type : "bar",
				data : chartdata,
				options : options
			});

    },
    error: function(data) {
      //console.log(data);
      console.log("error");
    }
  });
}

function obtenerEntradasGenero(anio){ //Entradas por genero
  //console.log("CAMBIO");
  $.ajax({
    url: "charts.php",
   data: {method: 'obtenerEntradasGenero', anioSel: anio},
    method: "GET",
    success: function(data) {
     // console.log(data);
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
       //console.log(data[i].genero);
       estadoLabels.push(data[i].genero);
       //console.log(data[i].Personas);
        score.push(data[i].Personas);
      }

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            label: 'G\xE9nero',
            backgroundColor: '#4eb7d2', //AZUL
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor: '#30a0bd', //AZUL OSCURO
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Entradas por g\xE9nero "+anio,
					fontSize : 20,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

      var divDoughnutGenero = $("#visitanteGeneroChart");

			var doughnutGraph = new Chart(divDoughnutGenero, {
				type: 'bar',
        data: chartdata,
        options : options
      });
    },
    error: function(data) {
      //console.log(data);
      console.log("error");
    }
  });
}

$(document).ready(obtenerEntradas(anio));

$(document).ready(obtenerEntradasGenero(anio));

///////// PERSONAL
$(document).ready(function(){
  $.ajax({
    url: "charts.php",
    data: {method: 'obtenerUsuario', anioSel: null},
    method: "GET",
    success: function(data) {
    //  console.log(data);
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
      // console.log(data[i].nombre);
       estadoLabels.push(data[i].nombre);
      // console.log(data[i].Cantidad);
        score.push(data[i].Cantidad);
      }

      var divUsuarios= $("#doughnutUsuarios");

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            backgroundColor: '#4eb7d2', //AZUL
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor: '#30a0bd', //AZUL OSCURO
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Usuarios actualmente existentes",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

			var chart = new Chart(divUsuarios, {
				type : "horizontalBar",
				data : chartdata,
				options : options
			});

    },
    error: function(data) {
      //console.log(data);
      console.log("error");
    }
  });
});

function obtenerPrestamos(anio){ //Entradas mensuales
  $.ajax({
    url: "charts.php",
    data: {method: 'obtenerPrestamos', anioSel: anio},
    method: "GET",
    success: function(data) {
      //console.log(data);
      var estadoLabels = [];
      var score = [];

      //alert(data[0]);
      for(var i in data) { //Ingreso las cantidades y estados a su respectivo arreglo
      // console.log(data[i].nombre);
       estadoLabels.push(data[i].Enero);
      // console.log(data[i].Cantidad);
        score.push(data[i].Prestamos);
      }

      var divVisitante= $("#prestamosChart");

      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            backgroundColor: '#4eb7d2', //AZUL
            borderColor: 'rgba(200, 200, 200, 0.75)', //GRIS
            hoverBackgroundColor: '#30a0bd', //AZUL OSCURO
            hoverBorderColor: 'rgba(200, 200, 200, 1)', //GRIS
            data: score
          }
        ]
      };

      var options = {
				title : {
					display : true,
					position : "top",
					text : "Pr\xE9stamos "+anio,
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

      var chart = new Chart(divVisitante, {
 				type : "bar",
 				data : chartdata,
 				options : options
 			});
     },
     error: function(data) {
       console.log(data);
       console.log("error");
     }
   });
 }
$(document).ready(obtenerPrestamos(anio));
//////////////////////////////////////////////////// SELECTORES
//////////////Para filtrar estadisticas por año
$("select").each(function(){
  $(this).change(function(){
    anioPrestamo = document.getElementById("yearPrestamo").value;
    anioEntradasGenero = document.getElementById("yearGenero").value;
    anioEntradas = document.getElementById("yearEntrada").value;
   // console.log(anio);
    obtenerEntradas(anioEntradas);
    obtenerEntradasGenero(anioEntradasGenero);
    obtenerPrestamos(anioPrestamo);
   //console.log(obj);
    //console.log(data);
  });
});


//////////////Para imprimir estadisticas


$("#download").click(function() {
 	   window.print();
});


