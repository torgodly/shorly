<div>
    <div class="flex p-2 gap-5">
        <p class="font-bold" wire:click="chartt('Day',Month)">month</p>

    </div>
    <div id="chart">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>



        var options = {
            series: [{
                name: "page Views",
                data: @json($views),
            }],
            chart: {
                id: 'myChart',
                type: 'area',
                height: 450,
                foreColor: "#000000",
                zoom: {
                    enabled: false
                },
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                }, toolbar: {
                    show: false,
                },
            },
            colors: ["#f4812a", "#FF0080", "#ED7D31"],

            dataLabels: {
                style: {
                    colors: ['#f4812a']
                },
                enabled: true,
                textAnchor: 'end',
                dropShadow: {
                    enabled: true,
                },
            },

            stroke: {
                curve: "smooth"
            },
            markers: {
                size: 5,
                colors: ["#000524"],
                strokeColor: "#00BAEC",
                strokeWidth: 3
            },


            markers: {
                size: 1
            },

            grid: {
                borderColor: "#555",
                clipMarkers: false,
                yaxis: {
                    lines: {
                        show: false
                    }
                }
            },

            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.55,
                    opacityTo: 0
                }
            },

            xaxis: {
                categories: @json($dates)

            },
            yaxis: {
                opposite: false
            },

            legend: {
                position: "top",
                horizontalAlign: "left",
                floating: true,
                offsetY: -25,
                offsetX: -5
            },
            tooltip: {
                enabled: true,
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);


        chart.render();

        window.addEventListener('chart-updated', event => {
            chart.updateSeries([{
                data: event.detail.views
            }])

            chart.updateOptions({
                xaxis: {
                    categories: event.detail.dates
                },
            })
        })


    </script>

</div>
