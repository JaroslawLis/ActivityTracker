{{-- {{dd($charts_data)}} --}}
@extends('layouts.main')

@section('content')
<div class="w-full bg-gray-100  ">
<div class="bg-gray-400 py-4"><a href="{{ route('current_bar_charts') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 border border-blue-700 rounded">Bar Charts</a><a href="{{ route('current_charts') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 border border-blue-700 rounded">Line Charts</a></div>
<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
<div class="flex flex-row flex-wrap flex-grow mt-2">
<div class="hidden">{{$counter = 0}}</div>
@foreach( $charts_data as $name => $chart_data)

<div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">{{$name}}</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-{{$counter++}}" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                var labels =JSON.parse(`<?php echo json_encode($chart_data['labels']); ?>`);
                                var values =JSON.parse(`<?php echo json_encode($chart_data['values']); ?>`);



                                new Chart(document.getElementById("chartjs-{{($counter-1)}}"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": labels,
                                        "datasets": [{
                                            "label": "values",
                                            "data": values,
                                            "fill": false,
                                            //"borderColor": "rgb(75, 192, 192)",
                                            "backgroundColor": "#"+Math.floor(Math.random()*16777215).toString(16),
                                            "lineTension": 0.1
                                        },

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
