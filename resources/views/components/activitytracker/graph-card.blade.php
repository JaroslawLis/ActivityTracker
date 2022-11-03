@extends('layouts.main')

@section('content')
    <div class="w-full bg-gray-100">
        <div class="py-4 bg-gray-400 mt-14 md:mt-0"><a href="{{ route('current_bar_charts') }}"
                class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Bar
                Charts</a></div>
        <div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
            <div class="flex flex-row flex-wrap flex-grow mt-2">
                @php
                    $counter = 0;
                @endphp
                @foreach ($charts_data as $name => $chart_data)
                    <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                        @php
                            $chart_data['name'] = $name;
                            $chart_data['counter'] = $counter;
                        @endphp
                        <x-graph-card :chartData="$chart_data" />
                        @php
                            $counter++;
                        @endphp
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
