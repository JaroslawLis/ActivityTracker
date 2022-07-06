@extends('layouts.main')

@section('content')
    <div class="flex flex-col w-full h-screen bg-gray-8 00">
        <div class="p-4 text-2xl text-white shadow rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800" bg-gray-800>
            <h3 class="pl-2 font-bold text-center">Activities List</h3>
        </div>
        <table class="self-center table w-full mt-4 border-4 border-collapse border-gray-800 md:w-4/6">
            <thead class="block md:table-header-group">
                <tr
                    class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Lp</th>
                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Name</th>
                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr
                    class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative">

                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Lp</th>
                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Name</th>
                    <th
                        class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">
                        Actions</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($activities as $activity)
                    <tr
                        class="{{ $loop->iteration % 2 == 1 ? 'bg-gray-300' : 'bg-white' }} border border-grey-500 md:border-none block md:table-row">
                        <td class="pl-2">{{ $loop->iteration }}</td>
                        <td class="text-lg font-bold md:font-semibold">{{ $activity['name'] }}</td>
                        <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">
                            <span class="inline-block w-1/3 font-bold md:hidden">Actions</span>
                            <div>
                                <a href="{{ route('get.activity.edit', ['activityId' => $activity['id']]) }}"
                                    class="px-2 py-1 font-bold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700">Edit</a>
                                <a href="{{ route('get.activity.show', ['activityId' => $activity['id']]) }}"
                                    class="px-2 py-1 mx-2 font-bold text-white bg-red-500 border border-red-500 rounded hover:bg-red-700">Details</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
