@extends('layouts.main')

@section('content')

<div class="bg-white w-full p-14 h-screen flex items-center justify-center" style="background: #edf2f7;">

<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Activity</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Total</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Average</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Current Target</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Surplus/Shortage</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
        @foreach( $current_month_stats as $name => $activities)
            <tr class="{{ ($loop->iteration%2) == 1 ? 'bg-gray-300': 'bg-white' }} border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Activity</span>{{ $name }}</td>
                <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Total</span>{{ $activities['total'] }}</td>
                <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Average</span>{{$activities['avg'] }}</td>
                <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Target</span>{{$activities['current_target']  }}</td>
                <td class="p-2 md:border md:border-grey-500 text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">+/-</span>{{ $activities['surplus_shortage'] }}</td>
            </tr>
        @endforeach
	</tbody>
	</table>
</div>

@endsection
