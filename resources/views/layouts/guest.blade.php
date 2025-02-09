<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'DebugAcademia') }}</title>

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">   
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
    <body>
    <div class="container">
  
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mt-5 row justify-content-center">
                <a href="/">
                    <img width="175" src="/images/debugLogo.png"/>
                </a>
            </div>    
            <div class="shadow-md overflow-hidden sm:rounded-lg">
               
                     
                {{ $slot }}
            </div>
        </div>    
    </div>
</body>
</html>
