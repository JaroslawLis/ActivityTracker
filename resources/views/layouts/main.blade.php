<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    {{-- <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created--> --}}
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>

<body class="mt-12 font-sans leading-normal tracking-normal bg-gray-800">

    <!--Nav-->
    <nav class="fixed top-0 z-20 w-full h-auto px-1 pt-2 pb-1 mt-0 bg-gray-800 md:pt-1">
        <h1 class="white">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
        </h1>
        <div class="flex flex-wrap items-center">
            <div class="flex justify-center flex-shrink text-white md:w-1/3 md:justify-start">
                <a href="{{ route('main') }}">
                    <span class="pl-2 text-xl"><i class="em em-grinning"></i></span>
                </a>
            </div>

            <div class="flex justify-center flex-1 px-2 text-white md:w-1/3 md:justify-start">
                <span class="relative w-full">
                    <input type="search" placeholder="Search"
                        class="w-full px-2 py-3 pl-10 leading-normal text-white transition bg-gray-900 border border-transparent rounded appearance-none focus:outline-none focus:border-gray-400">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="w-4 h-4 text-white pointer-events-none fill-current"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex content-center justify-between w-full pt-2 md:w-1/3 md:justify-end">
                <ul class="flex items-center justify-between flex-1 list-reset md:flex-none">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block px-4 py-2 text-white no-underline" href="#">Active</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <a class="inline-block px-4 py-2 text-gray-600 no-underline hover:text-gray-200 hover:text-underline"
                            href="#">link</a>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="text-white drop-button focus:outline-none">
                                <span class="pr-2"><i class="em em-robot_face"></i></span> Hi,
                                {{ Auth::user()->name }} <svg class="inline h-3 fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg></button>
                            <div id="myDropdown"
                                class="absolute right-0 z-30 invisible p-3 mt-3 overflow-auto text-white bg-gray-700 dropdownlist">
                                {{-- <input type="text" class="p-2 text-gray-600 drop-search" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                                <a href="#" class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"><i class="fa fa-user fa-fw"></i> Profile</a>
                                <a href="#" class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"><i class="fa fa-cog fa-fw"></i> Settings</a>
                                <div class="border border-gray-800"></div> --}}
                                {{-- <a href="{{ route('logout') }}" class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a> --}}
                                <a class="block p-2 text-sm text-white no-underline hover:bg-gray-800 hover:no-underline"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">

        <div class="fixed bottom-0 z-10 w-full h-16 mt-12 bg-gray-800 shadow-xl md:relative md:h-screen md:w-48">

            <div
                class="content-center justify-between text-left md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 md:content-start">
                <ul class="flex flex-row px-1 py-0 text-center list-reset md:flex-col md:py-3 md:px-2 md:text-left">
                    <li class="flex-1 mr-3">
                        <a href="{{ route('list') }}"
                            class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800 md:py-3 hover:text-white hover:border-pink-500">
                            <i class="pr-0 fas fa-tasks md:pr-3"></i><span
                                class="block pb-1 text-xs text-gray-600 md:pb-0 md:text-base md:text-gray-400 md:inline-block">Activities</span>
                        </a>
                    </li>
                    <li class="flex-1 mr-3">
                        <a href="{{ route('create') }}"
                            class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800 md:py-3 hover:text-white hover:border-pink-500">
                            <i class="pr-0 fas fa-tasks md:pr-3"></i><span
                                class="block pb-1 text-xs text-gray-600 md:pb-0 md:text-base md:text-gray-400 md:inline-block">Add
                                Activity</span>
                        </a>
                    </li>
                    <li class="flex-1 mr-3">
                        <a href="{{ route('add_checkin') }}"
                            class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800 md:py-3 hover:text-white hover:border-purple-500">
                            <i class="pr-0 fa fa-envelope md:pr-3"></i><span
                                class="block pb-1 text-xs text-gray-600 md:pb-0 md:text-base md:text-gray-400 md:inline-block">Checkins</span>
                        </a>
                    </li>
                    <li class="flex-1 mr-3">
                        <a href="{{ route('statistics') }}"
                            class="block py-1 pl-1 text-white no-underline align-middle border-b-2 border-gray-800 md:py-3 hover:text-white hover:border-blue-600">
                            <i class="pr-0 fas fa-chart-area md:pr-3 "></i><span
                                class="block pb-1 text-xs text-white md:pb-0 md:text-base md:text-white md:inline-block">Statistics</span>
                        </a>
                    </li>
                    <li class="flex-1 mr-3">
                        <a href="{{ route('current_charts') }}"
                            class="block py-1 pl-0 text-white no-underline align-middle border-b-2 border-gray-800 md:py-3 md:pl-1 hover:text-white hover:border-red-500">
                            <i class="pr-0 fa fa-wallet md:pr-3"></i><span
                                class="block pb-1 text-xs text-gray-600 md:pb-0 md:text-base md:text-gray-400 md:inline-block">Charts</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
        @yield('content')

    </div>




    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>


</body>

</html>
