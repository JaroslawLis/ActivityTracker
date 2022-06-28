@extends('layouts.main')

@section('content')
    <div class="container w-full max-w-xl mx-auto">

        <form class="px-8 pt-12 pb-12 mb-4 bg-white rounded shadow-md lg:pt-6 lg:pb-8" action="/create" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Activity name
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="name" type="text" placeholder="Activity name">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Activity descritpion
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="description" type="text" placeholder="descritpion">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="starting_date">
                    Starting Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="starting_date" type="date" placeholder="">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="end_date">
                    End Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="end_date" type="date" placeholder="">

            </div>
            <div>
                <div class="mt-4">
                    <span class="block mb-2 text-sm font-bold text-gray-700">Activity Type</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="type" value="1">
                            <span class="ml-2">Items</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="type" value="2">
                            <span class="ml-2">Duration (time)</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="Aim">
                    Target
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="target" type="integer" placeholder="">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="max_value">
                    Maximum value
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="max_value" type="integer" placeholder="">
            </div>
            <div class="flex justify-end items-right">
                <button
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </div>

        </form>
        <p class="text-xs text-center text-gray-500">

        </p>
    </div>
@endsection
