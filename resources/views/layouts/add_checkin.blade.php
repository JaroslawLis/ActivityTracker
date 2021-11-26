@extends('layouts.main')

@section('content')



<div class="bg-white flex-col pl-8 pr-8 pt-8">
    <div>Current date: <strong> {{$last_entry_date}}</strong> </div>
  @if(session('status'))
    <div class="text-lg font-bold text-red-500 pt-8 pl-8">
        {{ session('status') }}
    </div>
  @endif


    <form  action="/add_checkin" method="POST">
    @csrf
        @foreach($activities as $activity)
            <div class="p-4">
                <label for="{{$activity->id}}">{{$activity->name}}</label>
                <input type="number" name="{{$activity->id}}" min="0" max="{{$activity->max_value}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        @endforeach
        <input type="data" value="{{$last_entry_date}}" class="hidden" name="date">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right mr-4" >Zapisz</button>
    </form>
</div>

@endsection
