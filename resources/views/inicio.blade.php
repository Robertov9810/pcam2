<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>   
                         
                    </div>                
            <!-- Link hacia el archivo de estilos css -->
            <link rel="stylesheet" href="css/login.css">           
            <style type="text/css">                
            </style>           
            <script type="text/javascript">            
            </script>           
        </head>       
        <body>       
            <div id="contenedor">   
                <div id="contenedorcentrado" > 
                    
                        <form id="loginform">
                            <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <IMG SRC="imagenes/logopcam.png" style=" width: 300px;">
           
                <div id="derecho">
                         @if (Route::has('login'))
                <center><div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"></center>
                              
                    @auth
                       <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                     <a href="{{ route('login') }}" class="text-sm text-white-700 dark:text-gray-500 underline "><h2> Iniciar sesión </h2></a>                     

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> <h2> Registrar </h2></a> 
                        @endif
                    @endauth
                </div>
            @endif                                                       
                        </form>                       
                    </div>
                </div>
          
       
            
                            
    </body>
</html>