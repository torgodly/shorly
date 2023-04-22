<div>
    <div class=" rounded-md p-4 space-y-6 md:flex md:justify-between md:flex-row-reverse md:items-center">
        <div class="flex gap-3 order-2">
            <div class="flex flex-col space-y-2">
                <label for="start_date" class="text-sm font-semibold text-gray-600">{{__("Start Date")}}</label>
                <input type="date" id="start_date"
                       class="px-4 py-2 border rounded-md shadow-sm text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       wire:model="startDate">
            </div>

            <div class="flex flex-col space-y-2">
                <label for="end_date" class="text-sm font-semibold text-gray-600">{{__("End Date")}}</label>
                <input type="date" id="end_date"
                       class="px-4 py-2 border rounded-md shadow-sm text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       wire:model="endDate">
            </div>
        </div>

        <div class="flex flex-col">
            <select id="scope"
                    class="w-full sm:w-auto px-4 py-2 border rounded-md shadow-sm text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rtl:text-left ltr:text-right"
                    wire:model="scope">
                <option value="perDay">{{__('Per Day')}}</option>
                <option value="perWeek">{{__('Per Week')}}</option>
                <option value="perMonth">{{__('Per Month')}}</option>
                <option value="perYear">{{__('Per Year')}}</option>
            </select>
        </div>
    </div>


    <div wire:ignore>
        <div class="chart-container" style="height: 70vh; width: 100%;">
            <canvas id="myChart" height="800" width="1500"></canvas>
        </div>
    </div>
    <div>

        <h1 class="text-xl font-semibold">{{__("Total Visitors:")}} <span
                class="text-xl font-bold">{{Auth::user()->visitLogs()->count()}}</span></h1>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <script>
        Chart.register(ChartDataLabels);
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($dates),
                datasets: [{
                    label: 'Page Views',
                    data: @json($views),
                    backgroundColor: 'rgb(244,129,42,0.4)',
                    borderColor: 'rgb(244,129,42)',
                    fill: 'start',
                    borderWidth: 3,
                    borderDash: [],
                    borderDashOffset: 0,
                    textColor: '#e00909',
                    pointBackgroundColor: 'rgba(42,157,244,0.4)',
                    pointBorderColor: "rgba(255,255,255,0)",
                    pointHoverBackgroundColor: 'rgb(244,129,42,0.4)',
                    pointBorderWidth: 20,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 15,
                    pointRadius: 4,
                    lineTension: 0.4,
                }]

            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: "#000000",
                        fontSize: 16
                    }
                },
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        // text: 'Page Views',
                        font: {
                            size: 20,
                            weight: 'bold'
                        },
                        color: '#000000'
                    },
                    tooltip: {
                        backgroundColor: 'rgb(0,0,0)',
                        titleFont: {
                            size: 16,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 14
                        },
                        callbacks: {
                            title: function (tooltipItem, data) {
                                return 'Page Views';
                            },
                            label: function (tooltipItem, data) {
                                return tooltipItem.yLabel;
                            }
                        }
                    },
                    datalabels: { // This code is used to display data values
                        anchor: 'end',
                        align: 'top',
                        formatter: Math.round,
                        font: {
                            weight: 'bold',
                            size: 15
                        }
                    }
                },
                backgroundColor: '#f4812a'
            }


        });

        window.addEventListener('chart-updated', event => {
            myChart.data.labels = event.detail.dates;
            myChart.data.datasets[0].data = event.detail.views;
            myChart.update();
        });
    </script>


</div>
