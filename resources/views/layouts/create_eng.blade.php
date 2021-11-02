@extends('layouts.main')

@section('content')

<div class="w-full max-w-xl container mx-auto">

  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/create" method="POST">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Activity name
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="name" type="text" placeholder="Activity name">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Activity descritpion
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" type="text" placeholder="descritpion">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="starting_date">
        Starting Date
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"  name="starting_date" type="date" placeholder="">
      {{-- <p class="text-red-500 text-xs italic">Please choose a starting date.</p> --}}
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
        End Date
      </label>
      <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="end_date" type="date" placeholder="">

    </div>
    {{-- <div>
        <label class="block mt-4">
    <span class="text-gray-700">Type</span>
    <select class="form-select mt-1 block w-full">
      <option>Items</option>
      <option>Duration</option>
    </select>
  </label>
    </div> --}}
    <div>
         <div class="mt-4">
    <span class="block text-gray-700 text-sm font-bold mb-2">Activity Type</span>
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
      <label class="block text-gray-700 text-sm font-bold mb-2" for="Aim">
        Target
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="target" type="integer" placeholder="">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="max_value">
        Maximum value
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="max_value" type="integer" placeholder="">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
        Zapisz
      </button>
      {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Forgot Password?
      </a> --}}
    </div>

  </form>
  <p class="text-center text-gray-500 text-xs">

  </p>
</div>

@endsection
