@extends('layouts.main')

@section('content')
    <div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/update/{{ $editId }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Activity name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="name" type="text" value="{{ $name }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Activity descritpion
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="description" type="text" value="{{ $description }}">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="starting_date">
                    Starting Date
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="starting_date" type="date" placeholder="" value="{{ $starting_date }}">
                {{-- <p class="text-red-500 text-xs italic">Please choose a starting date.</p> --}}
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                    End Date
                </label>
                <input
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="end_date" type="date" placeholder="" value="{{ $end_date }}">

            </div>
            <div>
                <div class="mt-4">
                    <span class="block text-gray-700 text-sm font-bold mb-2">Activity Type</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="type" value="1"
                                {{ $type == 1 ? 'checked' : '' }}>
                            <span class="ml-2">Items</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="type" value="2"
                                {{ $type == 2 ? 'checked' : '' }}>
                            <span class="ml-2">Duration (time)</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Aim">
                    Target
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="target" type="integer" placeholder="" value="{{ $target }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="max_value">
                    Maximum value
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="max_value" type="integer" placeholder="" value="{{ $max_value }}">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Zapisz
                </button>
            </div>
        </form>
    </div>
@endsection
