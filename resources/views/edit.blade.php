@extends('layouts.main')

@section('content')
    <div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md" action="/update/{{ $editId }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Activity name
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="name" type="text" value="{{ $name }}">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Activity descritpion
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="description" type="text" value="{{ $description }}">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="starting_date">
                    Starting Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="starting_date" type="date" placeholder="" value="{{ $starting_date }}">
                {{-- <p class="text-xs italic text-red-500">Please choose a starting date.</p> --}}
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="end_date">
                    End Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="end_date" type="date" placeholder="" value="{{ $end_date }}">

            </div>
            <div>
                <div class="mt-4">
                    <span class="block mb-2 text-sm font-bold text-gray-700">Activity Type</span>
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
                <label class="block mb-2 text-sm font-bold text-gray-700" for="Aim">
                    Target
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="target" type="integer" placeholder="" value="{{ $target }}">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="max_value">
                    Maximum value
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="max_value" type="integer" placeholder="" value="{{ $max_value }}">
            </div>
            <div class="flex items-center justify-end">
                {{-- justify-end items-right --}}
                <button
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
