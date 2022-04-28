@extends('layouts.main')

@section('content')



<div class="flex-1 pb-24 mt-12 bg-gray-200 md:mt-2 md:pb-5">

    <div class="container flex-1 p-6 mx-auto mt-12 text-gray-700 bg-gray-400 rounded-lg shadow-2xl ">
        <h2 class="mt-4 mb-4 text-4xl font-bold leading-tight text-gray-800">Infomation card</h2>
        <table class="table-auto ">
            <tbody class="text-lg">
                <tr>
                    <td>Name: </td>
                    <td class="font-bold">{{$activity->name}}</td>
                </tr>
                  <tr>
                    <td>Description: </td>
                    <td class="font-bold">{{$activity->description}}</td>
                </tr>
                <tr>
                    <td>Starting date: </td>
                    <td class="font-bold">{{$activity->starting_date}}</td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td class="font-bold">{{$activity->type}}</td>
                </tr>
                <tr>
                    <td>Target: </td>
                    <td class="font-bold">{{$activity->target}}</td>
                </tr>


            </tbody>
        </table>

    </div>
</div>

@endsection
