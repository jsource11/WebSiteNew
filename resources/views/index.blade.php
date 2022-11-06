<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>jonnygcoder-website</title>

        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    </head>
    <body class="font-poppins text-gray-200 ">

        <!-------- ##### Menú ##### -------->
        <nav class="bg-gradient-to-t from-cyan-500 to-blue-500 ... shadow-sm shadow-slate-300 ">

            <div class="container mx-auto px-0 py-3 flex items-center ">
                
                <!-- <h1 class="p-2 bg-blue-500 shadow-sm shadow-slate-500">{&nbsp;jonnygcoder&nbsp;}</h1> -->
                <h1 class="text-blue-800 flex items-center text-[24px]">{&nbsp;jonnygcoder&nbsp;}</h1>

                <div class="ml-12 lg:flex space-x-5 hidden ">
                    <a href="#" class="flex items-center font-semibold text-md hover:text-blue-700 transition " >
                        <span class="mr-2">
                            <i class="fas fa-home"></i>
                        </span>
                        Inicio
                    </a>
                </div>    

                <div class="ml-12 lg:flex space-x-5 hidden ">
                    <a href="#" class="flex items-center font-semibold text-md hover:text-blue-700 transition " >
                        <span class="mr-2">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        Blog
                    </a>
                </div>  


                <div class="ml-12 lg:flex space-x-5 hidden ">
                    <a href="#" class="flex items-center font-semibold text-md hover:text-blue-700 transition " >
                        <span class="mr-2">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        Portafolio
                    </a>
                </div>  


                <div class="ml-12 lg:flex space-x-5 hidden ">
                    <a href="#" class="flex items-center font-semibold text-md hover:text-blue-700 transition " >
                        <span class="mr-2">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        Sobre mi
                    </a>
                </div>    


                <div class="ml-12 lg:flex space-x-5 hidden ">
                    <a href="#" class="flex items-center font-semibold text-md hover:text-blue-700 transition " >
                        <span class="mr-2">
                            <i class="fas fa-phone"></i>
                        </span>
                        Contacto 
                    </a>
                </div>   


                <div class="relative ml-auto hidden lg:block ">
                    <span class="absolute left-3 top-2 text-sm text-gray-600 ">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" placeholder="Buscar..." class="block w-full rounded-3xl pl-11 pr-2 py-2 focus:outline-none bg-gray-200 text-sm text-gray-600 shadow-sm shadow-slate-300 " />               
                </div>

                <!-- <div class="ml-5">
                    <a href="#" class="flex items-center font-semibold text-md text-gray-900 hover:text-blue-700 transition"  >
                        <span class="mr-2">
                            <i class="far fa-user"></i>
                        </span>
                        Login/Register
                    </a>
                </div> -->

                <div class="text-xl text-gray-700 cursor-pointer ml-4 xl:hidden block hover:text-blue-700 transition " id="open_sidebar" >
                    <i class="fas fa-bars "></i>
                </div>

            </div>

        </nav>
        <!-------- ##### Fin Menú ##### -------->
        

        
        <div class="py-12 bg-gray-200 ">

        </div>


        <footer class="border-t py-4 ">
            <p class="text-sm text-center"> Copyright @ 2022 <span class="font-semibold">jonnygcoder </span> All Rrights Reserved
  
            </p>
  
       </footer>



    </body>
</html>
