@extends('layouts.main')

@section('content')
    {{-- <div class="flex items-center justify-center w-full h-screen bg-white p-14" style="background: #edf2f7;"> --}}
    <div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
        <div class="pt-3 bg-gray-800">
            <div class="p-4 text-2xl text-white shadow rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800">
                <h3 class="pl-2 font-bold text-center">Current statistics for {{ $month_name }} {{ $year }}</h3>
            </div>
            <div class="py-4 bg-gradient-to-r from-blue-900 to-gray-800 mt-14 md:mt-0"><a
                    href="monthly_stat/{{ $previous_y }}/{{ $previous_m }}"
                    class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Previous
                    month</a></div>
            <div>
                <div class="py-4 bg-gradient-to-r from-blue-900 to-gray-800 mt-14 md:mt-0"><a href="/days_stat/3"
                        class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Last
                        3 days</a><a href="/days_stat/7"
                        class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">
                        Last
                        7 days</a><a href="/days_stat/14"
                        class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Last
                        14 days</a><a href="/days_stat/30"
                        class="px-4 py-4 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Last
                        30 days</a>
                </div>
            </div>
        </div>
        <div class="p-10 ">
            <table class="block min-w-full border-collapse rounded-lg shadow-xl md:table">
                <thead class="block md:table-header-group">
                    <tr
                        class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative ">
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Activity</th>
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Total</th>
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Average</th>
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Current Target</th>
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Surplus/Shortage</th>
                        <th
                            class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                            Realization</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($current_month_stats as $name => $activities)
                        <tr
                            class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-300' : 'bg-white' }} border border-grey-500 md:border-none block md:table-row">
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">Activity</span>{{ $name }}</td>
                            <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">Total</span>{{ $activities['total'] }}
                            </td>
                            <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">Average</span>{{ $activities['avg'] }}
                            </td>
                            <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">Target</span>{{ $activities['current_target'] }}
                            </td>
                            <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">+/-</span>{{ $activities['surplus_shortage'] }}
                            </td>
                            <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell"><span
                                    class="inline-block w-1/3 font-bold md:hidden">+/-</span>{{ $activities['realization'] }}%
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
