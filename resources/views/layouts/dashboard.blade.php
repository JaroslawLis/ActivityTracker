@extends('layouts.main')
@section('content')
    <div class="flex-1 pb-24 mt-12 bg-gray-100 main-content md:mt-2 md:pb-5">
        <div class="pt-3 bg-gray-800">
            <div class="p-4 text-2xl text-white shadow rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800">
                <h3 class="pl-2 font-bold">Welcome to Activity Tracker</h3>
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div
                    class="p-5 border-b-4 border-green-600 rounded-lg shadow-xl bg-gradient-to-b from-green-200 to-green-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-green-600 rounded-full"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">Total Activities</h5>
                            <h3 class="text-3xl font-bold">{{ $activities }}
                                {{-- <span class="text-green-500"><i
                                        class="fas fa-caret-up"></i></span> --}}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div class="p-5 border-b-4 border-pink-500 rounded-lg shadow-xl bg-gradient-to-b from-pink-200 to-pink-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-pink-600 rounded-full"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">Total Users</h5>
                            <h3 class="text-3xl font-bold">249 <span class="text-pink-500"><i
                                        class="fas fa-exchange-alt"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div
                    class="p-5 border-b-4 border-yellow-600 rounded-lg shadow-xl bg-gradient-to-b from-yellow-200 to-yellow-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-yellow-600 rounded-full"><i class="fas fa-user-plus fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">New Users</h5>
                            <h3 class="text-3xl font-bold">2 <span class="text-yellow-600"><i
                                        class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div class="p-5 border-b-4 border-blue-500 rounded-lg shadow-xl bg-gradient-to-b from-blue-200 to-blue-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-blue-600 rounded-full"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">Server Uptime</h5>
                            <h3 class="text-3xl font-bold">152 days</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div
                    class="p-5 border-b-4 border-indigo-500 rounded-lg shadow-xl bg-gradient-to-b from-indigo-200 to-indigo-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-indigo-600 rounded-full"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">To Do List</h5>
                            <h3 class="text-3xl font-bold">7 tasks</h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full p-6 md:w-1/2 xl:w-1/3">
                <!--Metric Card-->
                <div class="p-5 border-b-4 border-red-500 rounded-lg shadow-xl bg-gradient-to-b from-red-200 to-red-100">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="p-5 bg-red-600 rounded-full"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold text-gray-600 uppercase">Issues</h5>
                            <h3 class="text-3xl font-bold">3 <span class="text-red-500"><i
                                        class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
        </div>




    </div>
@endsection
