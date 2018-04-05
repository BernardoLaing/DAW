
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

///////// LIBROS

$(document).ready(function(){
  $.ajax({
    url: "consultaEstadistica.php",
    data: {method: 'obtenerEstadosCall'},
    method: "GET",
    success: function(data) {
      //console.log(data);
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
      //console.log(data);
      console.log("error");
    }
  });
});

$(document).ready(function(){
  $.ajax({
    url: "consultaEstadistica.php",
    //data: {function2call: 'obtenerCategoriasCall', otherkey:otherdata},
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
					text : "Clasificaci\xF3n por ejemplar",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : false,
					position : "bottom"
				}
			};

			var chart = new Chart(divHistogramaCategoria, {
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
});

///////// VISITANTES


///////// PERSONAL
