<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400,500,600;1&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-black text-white font-hanken-grotesk pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="#">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>
            <div>
                @auth
                    <div class="space-x-6 font-bold flex">
                        <a href="{{ route('jobs.create') }}">POST A JOB</a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Log Out</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div class="space-x-6 font-bold">
                        <a href="{{ route('register') }}">Sign Up</a>
                        <a href="{{ route('login') }}">Log In</a>
                    </div>
                @endguest
            </div>
        </nav>

        <main class=" mt-10 max-w-[986px] mx-auto">{{ $slot }}</main>
    </div>
</body>

</html>
