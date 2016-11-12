<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>Quidditch Hooligans</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/website-mobile.css') }}" media="screen and (max-width: 480px)" />
        <link rel="stylesheet" href="{{ URL::asset('/css/website-tablet.css') }}" media="screen and (min-width: 481px) and (max-width: 768px)" /> 
        <link rel="stylesheet" href="{{ URL::asset('/css/website-desktop.css') }}" media="screen and (min-width: 769px)" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('/js/display.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <header>
            <h1><a href="http://www.christianhoward.net/laravel">Quidditch Hooligans</a></h1>
        </header>
        <br>
        <!-- Other HTML content -->
        <div id="session"></div>
        <div id="notification">
            <button id="table">Table</button><button id="form">Form</button>
            <!-- Notifications shown here -->
        </div>
        <div id="container">
        <!-- Main Container for dynamic content -->
        </div>
    <!-- Other HTML content -->
        <br>
        <footer>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </footer>
    </body>
</html>
