<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="styles.css?v=1.1">
</head>
<body>
<!-- header section starts -->  
@extends('design.main')

<!-- header section ends -->   
@section('main-section')

<div class="heading" style="background:url(pic/h3.jpg) no-repeat"> 
    <h1> Reviews</h1>
    
</div>
<!-- about us section starts -->



<!-- about us section ends -->

<!-- enter your review section starts --> 
<section class="review">
    <h1 class="heading-title">Enter your review</h1>
    <form action="/review_22301483" method="post" class="add-review">
        @csrf
        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>Star :</span>
                <input type="number" placeholder="Star" name="star" min="1" max="5" required>
            </div>
            <div class="inputBox">
                <span>Comment :</span>
                <input type="text" placeholder="Enter your comment" name="comment" required>
                <input type="hidden" name="user_id" value={{ $user_id }} required>
            </div>
        </div>
        <input type="submit" value="submit" class="btn" name="add-review">
    </form>
</section>
@php
$data = json_decode($json_data); // Decode the JSON data passed from the controller
$user_id= json_decode($user_id); 
@endphp
@foreach($data as $i)
<section class="reviews">
  <div class="box-container">
    <div class="box">
        <p>Customer name:</p>
        <h3>{{$i->name}}</h3>
        <p>Rating:</p>
        <h3>{{$i->star}}<i class="fa fa-star" aria-hidden="true"></i></h3>
        <p>Comment:</p>
        <h3>{{$i->comment}}</h3>
    </div>
  </div>
</section>
@endforeach


</body>
</html>
@endsection
@if(session('message'))
    <script>
        alert('{{ session('message') }}');
        window.location.href = 'review_22301483?user_id={{ $user_id }}';
    </script>
@endif