@extends('layouts.main')

@section('content')
<div class="bg-white">
<form  action="/add_checkin" method="POST">
@csrf
@foreach($activities as $activity)
<div class="p-4">
    <label for="{{$activity->id}}">{{$activity->name}}</label>
    <input type="number" name="{{$activity->id}}" min="0" max="{{$activity->max_value}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

  </div>
@endforeach
  <input type="data" value="{{$last_entry_date}}" class="" name="date">
 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
        Zapisz
      </button>
</form>
</div>



@endsection
