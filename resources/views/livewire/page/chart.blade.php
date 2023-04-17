<div>

    <div class="flex  justify-between items-center space-y-2 sm:space-y-0 sm:space-x-2">
        <select
            class="px-4 py-2 border rounded-md shadow-sm text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            wire:model="scope">
            <option value="perDay">{{__('Per Day')}}</option>
            <option value="perWeek">{{__('Per Week')}}</option>
            <option value="perMonth">{{__('Per Month')}}</option>
            <option value="perYear">{{__('Per Year')}}</option>
        </select>

        <div class="text-xl font-semibold flex gap-1">
            {{__('Total Visits Today:')}}

            <p class="text-xl font-bold">
                <span>{{Auth::user()->visitLogs()->today()->count()}}</span>
            </p>

        </div>

{{--        <div date-rangepicker datepicker-buttons datepicker-format="yyyy-mm-dd" class="flex items-center">--}}
{{--            <div class="relative">--}}
{{--                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">--}}
{{--                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"--}}
{{--                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"--}}
{{--                              clip-rule="evenodd"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <input  id="startDate" name="start" wire:model="startDate" type="text"--}}
{{--                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                       placeholder="Select date start">--}}
{{--            </div>--}}
{{--            <span class="mx-4 text-gray-500">to</span>--}}
{{--            <div class="relative">--}}
{{--                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">--}}
{{--                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"--}}
{{--                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"--}}
{{--                              clip-rule="evenodd"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <input id="endDate" name="end" wire:model="endDate" type="date" format---}}
{{--                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                       placeholder="Select date end">--}}
{{--            </div>--}}
{{--        </div>--}}

                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet"/>


    </div>


    <div wire:ignore>
        <div class="chart-container" style="height: 80vh; width: 100%;">
            <canvas id="myChart" height="800" width="1500"></canvas>
        </div>
    </div>
    <div>

        <h1 class="text-xl font-semibold">Total Visitors: <span class="text-xl font-bold">{{Auth::user()->visitLogs()->count()}}</span></h1>
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
