/* GRAFICO DE BARRAS */
function ejecutarChart(labels, datavalues, id){
    Chart.defaults.global.legend.display = false;
    let ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            //label: '# of Tomatoes',
            data: datavalues,
            backgroundColor: [
              'rgba(255, 99, 132, 0.3)',
              'rgba(54, 162, 235, 0.3)',
              'rgba(255, 206, 86, 0.3)',
              'rgba(75, 192, 192, 0.3)',
              'rgba(153, 102, 255, 0.3)',
              'rgba(255, 159, 64, 0.3)',
              'rgba(255, 99, 132, 0.3)',
              'rgba(54, 162, 235, 0.3)',
              'rgba(255, 206, 86, 0.3)',
              'rgba(75, 192, 192, 0.3)',
              'rgba(153, 102, 255, 0.3)',
              'rgba(255, 159, 64, 0.3)',
              'rgba(255, 99, 132, 0.3)',
              'rgba(54, 162, 235, 0.3)',
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            xAxes: [{
              ticks: {
                maxRotation: 90,
                minRotation: 80
              },
                gridLines: {
                offsetGridLines: true // à rajouter
              }
            },
            {
              position: "top",
              ticks: {
                maxRotation: 90,
                minRotation: 80
              },
              gridLines: {
                offsetGridLines: true // et matcher pareil ici
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
}

function buildChart(arr, identificador , attr1, attr2){
    /*Descripción:
    Función que construye un gráfico basado en la librería Chart JS. Recibe cuatro argumentos:

    arr -> arreglo de valores a graficar

    identificador -> ID del elemento HTML donde se renderizará el gráfico

    attr1 -> nombre del atributo que servirá para seleccionar los labels 

    attr2 -> nombre del atributo que servirá para obtener el dataset (los números a graficar)
    */
    let labels = [];
    let dataset = [];

    if(typeof(arr)=='object'){
        arr=Object.values(arr);
        console.log('entra a typeof');
    }

    for (let i=0; i<arr.length; i++){
        //console.log(arr[i]);
        if(arr[i][attr2]!=null && arr[i][attr2]>0){
            if(arr[i][attr1].length>25){
                let aux= arr[i][attr1].substring(0,1) + ". ";
                let cadena =aux + arr[i][attr1].substr(-20);
                labels.push(cadena);
            }else{
                labels.push(arr[i][attr1]);
            }
            //labels.push(arr[i][attr1]);
            dataset.push(arr[i][attr2]);
        }
    } 
    console.log("LABELS:" +labels);
    console.log("DATA:" +dataset);
    ejecutarChart(labels, dataset, identificador);

}