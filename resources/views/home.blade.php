<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<!-- header section starts -->  
@extends('design.main')

<!-- header section ends -->  


@section('main-section')
<!-- home section starts --> 
@php
$user_id= json_decode($user_id);            
@endphp
<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
 
            <div class="swiper-slide" style="background:url(pic/h2.jpg) no-repeat">
                <div class="content">
                    <span> study with us
                    </span>
                </div>
            </div>

            <div class="swiper-slide" style="background:url(pic/h3.jpg) no-repeat">
                <div class="content">
                    <span> study with us </span>
                </div>
            </div>

            <div class="swiper-slide" style="background:url(pic/h1.jpg) no-repeat">
                <div class="content">
                    <span> study with us </span>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".home-slider", {
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });

    </script>
</section>

<!-- home section ends --> 






<!--services section starts-->

<section class="services">

    <h1 class="heading-title"> our services </h1>

    <div class="box-container">

        <div class="box">
            <img src="pic/w5.jpg" alt=""> 
            <h3> Wallpapers </h3>
        </div>

        <div class="box">
            <img src="pic/n1.jpg" alt=""> 
            <h3> Notepads </h3>
        </div>

        <div class="box">
            <img src="pic/pp1.jpg" alt=""> 
            <h3> Profile Pictures </h3>
        </div>

        <div class="box">
            <img src="pic/t1.jpg" alt=""> 
            <h3>Timers </h3>
        </div>
    </div>


</section>
<!--services section ends-->

<!-- home about section starts-->

<section class="home-about">

    <div class="image">
        <img src="pic/a1.jpg" alt=""> 
    </div>

    <div class="content">
        <h3>about us</h3>
        <a href="review_22301483?user_id={{ $user_id }}" class="btn">read more</a>
    </div>


</section>
</body>
</html>
@endsection
{{-- @if(session('message'))
    <script>
        alert('{{ session('message') }}');
        window.location.href = 'home?user_id={{ $user_id }}';
    </script>
@endif --}}