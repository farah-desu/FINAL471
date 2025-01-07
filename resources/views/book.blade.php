<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles.css?v=1.1') }}">
</head>
@php
$user_id= json_decode($user_id);            
$amount =json_decode($amount);     
@endphp
<body>

    @extends('design.main')

    @section('main-section')
    <div class="heading" style="background:url({{ asset('pic/h4.jpg') }}) no-repeat">
        <h1>Buy Features</h1>
    </div>

    <section class="booking">
        <h1 class="heading-title">Buy Features</h1>

        <!-- Display error message if there is an error -->
        @if(session('error'))
        <div class="alert alert-danger" style="font-size: 1.5rem; font-weight: bold; text-align: center; padding: 15px; border: 2px solid #f5c2c7; border-radius: 8px; background-color: #f8d7da; color: #842029;">
            {{ session('error') }}
        </div>
        @endif


        <form action="confirm_book?user_id={{ $user_id }}" method="post" class="book-form">
            @csrf
            <div class="flex">
                <div class="inputBox">
                    <span>First Name :</span>
                    <input type="text" placeholder="Enter your first name" name="fname" required>
                </div>

                <div class="inputBox">
                    <span>Last Name :</span>
                    <input type="text" placeholder="Enter your last name" name="lname">
                </div>

                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>

                <!-- Pass the discounted amount and user ID as hidden fields -->
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="id" value="{{ $user_id }}">
            </div>

            <!-- Display the total amount payable -->
            <h3 style="text-align: center;"><b>Total Points: </b>{{ $amount }} </h3>

            <input type="submit" value="Submit" class="btn" name="send">
        </form>
    </section>
    @endsection
</body>
</html>
