<?php
    @include 'mysqlconecta.php';


    $result_niveis_ava = "select * from estrangeiros";
    $resultado_niveis_ava = mysqli_query($conn, $result_niveis_ava);
    while($row_niveis_ava = mysqli_fetch_assoc($resultado_niveis_ava)){

    }

?>
    <html>
     <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['nº de Estrangeiros',     825],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Gráfico de Estrangeiros',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

