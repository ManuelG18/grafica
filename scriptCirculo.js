setInterval(function(){


(async () => {
    var respuestaRaw = await fetch("./origenCirculo.php");
    var respuesta = await respuestaRaw.json();
    var $grafica = document.querySelector("#graficaCirculo");
    var descGenero = respuesta.genero; 
    var cantAlumnos = {
        label: "",
        data: respuesta.cantidad, 
        backgroundColor:["rgba(0, 201, 255, 0.1)","rgba(255, 0, 128, 0.1)"],
        borderColor: ["rgb(0, 201, 255)","rgb(255, 0, 128)"], 
        borderWidth: 1, 
    };

    new Chart($grafica, {
        type: 'pie', // Tipo de gráfica
        data: {
            labels: descGenero,
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