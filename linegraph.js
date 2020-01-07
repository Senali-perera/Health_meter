$(document).ready(function(){
  $.ajax({
    url : "http://localhost/project/pogress.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var date = [];
      var weight = [];
      var twitter_follower = [];
      var googleplus_follower = [];

      for(var i in data) {
        date.push(data[i].date);
        weight.push(data[i].weight);
        
      }

      var chartdata = {
        labels: date,
        datasets: [
          {
            label: "weight",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: weight
          },
          
        ]
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error : function(data) {

    }
  });
});



