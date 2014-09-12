<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Tushar Basu | A Digital Showcase</title>
        <meta name="description" content="Digital Film Makers. Full service digital video production with a passion for performance marketing and solutions that inspire curiosity.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="//use.typekit.net/ygk4ztc.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        @include('partials/css')
    </head>
    <body>
	    @include('partials/cases_header')
	    @yield('content')
	    @include('partials/footer')
        @include('partials/js')
        @include('partials/mainjs-original')
    </body>
</html>