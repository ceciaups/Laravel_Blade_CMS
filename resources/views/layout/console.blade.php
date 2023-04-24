<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link rel="stylesheet" href="{{url('app.css')}}">
        <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">

        <script src="{{url('app.js')}}"></script>
        
    </head>

    @if (Auth::check())

    <body id="body-dashboard">
        <header id="header-dashboard">
            <nav>
                <ul>
                    <li id="account">{{auth()->user()->first}} {{auth()->user()->last}}</p></li>
                    <li><a href="/console/dashboard"><i class="fa-solid fa-regular fa-house"></i>Home</a></li>
                    <li><a href="/console/users/list"><i class="fa-solid fa-user"></i>Users</a></li>
                    <li><a href="/console/projects/list"><i class="fa-solid fa-paperclip"></i>Projects</a></li>
                    <li><a href="/console/careers/list"><i class="fa-solid fa-user-tie"></i>Careers</a></li>
                    <li><a href="/console/career_types/list"><i class="fa-solid fa-quote-left"></i>Career Types</a></li>
                    <li><a href="/console/skills/list"><i class="fa-solid fa-gear"></i>Skills</a></li>
                    <li><a href="/console/logout"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a></li>
                </ul>
            </nav>
        </header>

        <main id="main-dashboard">

    @else

    <body id="body-login">
        <a href="/" class="button" id="return"><i class="fa-solid fa-rotate-left"></i>Return to My Portfolio</a>
        <h1 class="w3-text-red">Portfolio Console</h1> 

        <main>
            @endif

            @if (session()->has('message'))
                <div class="w3-padding w3-margin-top w3-margin-bottom">
                    <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
                </div>
            @endif

            @yield ('content')

        </main>

    </body>
</html>