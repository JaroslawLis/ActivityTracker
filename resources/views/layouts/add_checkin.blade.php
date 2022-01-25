@extends('layouts.main')

@section('content')



<div class="flex-col pt-8 pl-8 pr-8 mx-auto bg-white">
    <div>Current date: <strong> {{$last_entry_date}}</strong> </div>
  @if(session('status'))
    <div class="pt-8 pl-8 text-lg font-bold text-red-500">
        {{ session('status') }}
    </div>
  @endif


    <form  action="/add_checkin" method="POST">
    @csrf
        @foreach($activities as $activity)
            <div class="p-4">
                <label for="{{$activity->id}}">{{$activity->name}}</label>
                <input type="number" name="{{$activity->id}}" min="0" max="{{$activity->max_value}}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
            </div>
        @endforeach
        <input type="data" value="{{$last_entry_date}}" class="hidden" name="date">
        <button class="float-right px-4 py-2 mr-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" >Zapisz</button>
    </form>
</div>

@endsection
