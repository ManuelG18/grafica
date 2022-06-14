setInterval(function(){


(async () => {
    var numPromedio="";
    var respuestaRaw = await fetch("./origen.php");
    var respuesta = await respuestaRaw.json();
    var $grafica = document.querySelector("#grafica");
     numPromedio = respuesta.promedios; 
    var cantAlumnos = {
        label: "Cantidad de alumnos y sus promedios",
        data: respuesta.alumnos, 
        backgroundColor: 'rgba(39, 198, 66, 0.2)', 
        borderColor: 'rgba(7, 150, 33, 1)', 
        borderWidth: 1, 
    };

    new Chart($grafica, {
        type: 'bar', // Tipo de gráfica
        data: {
            labels: numPromedio,
            datasets: [
                cantAlumnos,
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
            animation: {
                duration: 0
            }
        }
    });
})();
},1000);