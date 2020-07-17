$(document).ready(function () {
    Graficar()
});
var Graficar = () => {

    var id = document.querySelector("#id_cabecera").value;


    fetch(`${config.route}/segsal/grafico/${id}`, {
        headers: {
            "X-CSRF-TOKEN": config.token,
            "Content-type": "application/json",
        },
        method: "POST",

    })
        .then(function (response) {

            return response.json();
        })
        .then(function (response) {
            console.log(response);


            AmCharts.makeChart("grafico_elementos", {
                type:"serial",
                theme:"dataviz",
                dataProvider: response,
                valueAxes:[ {
                    gridColor: "#FFFFFF",
                    gridAlpha: .2,
                    maximum: "100",
                    dashLength: 0,
                    labelFunction: function(value) {
                        return Math.round(value) + "%";
                      }
                }
                ],
                gridAboveGraphs:!0,
                startDuration:1,
                graphs:[ {
                    balloonText: "[[category]]: <b>[[value]]</b>",
                    fillAlphas: .8,
                    lineAlpha: .2,
                    type: "column",
                    valueField: "porcentaje"
                }
                ],
                chartCursor: {
                    categoryBalloonEnabled: !1,
                    cursorAlpha: 0,
                    zoomable: !1
                },
                categoryField:"elemento",
                categoryAxis: {
                    gridPosition: "start",
                    gridAlpha: 0,
                    tickPosition: "start",
                    tickLength: 20
                },
                export: {
                    enabled: !0
                },
                chart:{
                    logo:{
                        disabled : true
                    }
                },
                hideCredits:true,

            })
console.log(AmCharts)


        });









}

