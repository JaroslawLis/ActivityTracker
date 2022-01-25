{{-- {{dd($charts_data)}} --}}
@extends('layouts.main')

@section('content')
<div class="w-full bg-gray-100">
<div class="py-4 bg-gray-400 mt-14 md:mt-0" ><a href="{{ route('current_bar_charts') }}" class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Bar Charts</a></div>
<div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
<div class="flex flex-row flex-wrap flex-grow mt-2">
<div class="hidden">{{$counter = 0}}</div>
@foreach( $charts_data as $name => $chart_data)

<div class="w-full p-6 md:w-1/2 xl:w-1/3">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="p-2 text-gray-800 uppercase border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg bg-gradient-to-b from-gray-300 to-gray-100">
                            <h5 class="font-bold text-gray-600 uppercase">{{$name}}</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-{{$counter++}}" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                var labels =JSON.parse(`<?php echo json_encode($chart_data['labels']); ?>`);
                                var values =JSON.parse(`<?php echo json_encode($chart_data['values']); ?>`);
                                var target =JSON.parse(`<?php echo json_encode($chart_data['target']); ?>`);


                                new Chart(document.getElementById("chartjs-{{($counter-1)}}"), {
                                    "type": "line",
                                    "data": {
                                        "labels": labels,
                                        "datasets": [{
                                            "label": "data",
                                            "data": values,
                                            "fill": false,
                                            //"borderColor": "rgb(75, 192, 192)",
                                            "borderColor": "#"+Math.floor(Math.random()*16777215).toString(16),
                                            "lineTension": 0.1
                                        },
                                        {

                                            "label": "Target",
                                            "data": target,
                                            "fill": false,
                                            "borderColor": "#"+Math.floor(Math.random()*16777215).toString(16),
                                            "lineTension": 0.1
                                        }
                                        ]
                                    },
                                    "options": {}
                                });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

    @endforeach
    </div>
    </div>
</div>
@endsection
