@extends('layouts.main')

@section('content')
{{-- <div class="block"></i>Activities List</div> --}}
    <div class="bg-white w-full p-14 h-screen flex items-center justify-center" style="background: #edf2f7;">
                <table class="w-4/6 border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Lp</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                        </tr >
                    </thead>
                    <tfoot>
                       <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">

                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Lp</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
                        </tr >
                    </tfoot>
                    <tbody>

                        @foreach($activities as $activity)
                            <tr class="{{ ($loop->iteration%2) == 1 ? 'bg-gray-300': 'bg-white' }} border border-grey-500 md:border-none block md:table-row ">
                                <td class="pl-2">{{ $loop->iteration }}</td>
                                <td>{{ $activity['name'] }}</td>
                                {{-- <td><a href="{{ route('get.user.show', ['userId' => $user['id']]) }}">Szczegóły</a></td> --}}
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					                <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					                <a href="{{ route('get.activity.edit', ['activityId' => $activity['id']]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</a>
					                <a href="{{ route('get.activity.show', ['activityId' => $activity['id']]) }}"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Details</a>
				                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


    </div>
@endsection
