<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="app.css">
    <style>
        body {
            padding-top: 80px; 
        }

        .sidebar {
            position: fixed;
            height: 100%;
            top: 4rem;
            left: 0;
        }
    </style>
</head>
<body>
    <header class="px-4 py-3 shadow fixed top-0  bg-white" style="margin-left: 255px;width:83.3%">
        <div class="flex justify-end" >
            <div class="flex items-center">
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <img src="#" alt="Profle" class="h-8 w-8 rounded-full">
                    <span class="ml-4 text-sm hidden md:inline-block" style="font-weight: bold; font-size:20px">
                        @auth
                            {{ auth()->user()->name }}
                        @endauth
                    </span>
                    
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>
                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-6 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false" style="width: 150px; height: 80px;">
                        <ul>
                            <li class="px-2 py-2 " ><a href="#" style="text-decoration: none ;color:black ; font-weight:bold">My Profile</a></li>
                            <li class="px-2 py-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center">
                                        
                                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </button>
            </div>
        </div>
    </header>
    <div class="flex flex-row" >
        <div class="sidebar flex flex-col w-120 h-screen overflow-y-auto  " style="margin-top:-65px ;background-color:#0d0e19f0">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-3 flex items-center  px-4 duration-300 cursor-pointer text-white" style="border-bottom: 2px solid  #fff">                    
                        <h4 class="font-bold  text-[10px] ml-3 mt-2" >Admin Panel</h4>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <a href="#" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <span class="text-[15px] ml-4  font-bold">-Admin-Home</span>
                    </div>
                </a>
                <a href="#" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <span class="text-[15px] ml-4  font-bold">-Admin-Products</span>
                    </div>
                </a>
                <a href="#" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <span class="text-[15px] ml-4  font-bold">Go back to the home page</span>
                    </div>
                </a>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-4 ml-80">
            <div>@yield('content')</div>
        </div>
    </div>
</body>
</html>
