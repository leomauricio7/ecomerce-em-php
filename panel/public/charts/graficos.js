$(document).ready(function(){
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(graficoPizza);
    google.charts.setOnLoadCallback(graficoColuna);

    function graficoPizza() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Usuários',     11],
        ['Categorias',      2],
        ['Produtos',  2],
        ['Pedidos', 2],
        ['Cupons',    7]
    ]);

    var options = {
        title: 'Dados do e-commerce'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }
    /*********************************************************************************** */

    function graficoColuna() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Quantidade", { role: "style" } ],
          ["Janeiro", 8, "#b87333"],
          ["fevereiro", 10, "silver"],
          ["Abril", 19, "gold"],
          ["Março", 21, "color: #e5e4e2"]
        ]);
  
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);
  
        var options = {
          title: "Compras realizadas no e-commerce",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
});