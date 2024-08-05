<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!---- title -->
    <title>Responsive Ecommerce Website | HTML CSS & JavaScript</title>

    <!---- customer css file -->
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">


     <!---- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body> 
    @include('flayout.header')


    @yield('noidung')

    @include('flayout.footer');

     <!---- customer js file -->
     <script src="{{asset('js/frontend/script.js')}}"></script>
     
</body>
</html>