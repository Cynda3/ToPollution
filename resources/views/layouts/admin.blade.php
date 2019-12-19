<!DOCTYPE html>
<html lang="en">
   <head>
      @include('elements.head')
   </head>
   <body>
    <div class="page-container">    
       <div class="left-content">
           <div class="mother-grid-inner">
               <!-- Header_Area -->
               <!-- header
                  ================================================== -->
               <header class="">
                  <!-- Crear elemento layout para el navegador en la columna izquierda
                  -->
                  @include('elements.navCol')

               </header>
            </div>
         </div>
      </div>

      <div class="container-profile container-profile-logged">

          @yield('content')


      </div>
      @include('elements.scripts')
   </body>
</html>