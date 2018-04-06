
$(document).ready(function(){
  $.ajax({
    url: "consultaEstadistica.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var estadoLabels = [];
      var score = [];

      for(var i in data) {
        estadoLabels.push(data[i].nombre);
        score.push(data[i].Cantidad + "");
      }
      


      var chartdata = {
        labels: estadoLabels,
        datasets : [
          {
            label: 'Estados',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'doughnut',
				data: chartdata
			});
      
    },
    error: function(data) {
      console.log(data);
    }
  });
});
