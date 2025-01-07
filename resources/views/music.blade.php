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
   <!-- custom css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- header section starts -->  
@extends('design.main')

@section('main-section')
<div class="heading" style="background: url(pic/m.jpg) no-repeat;">
    <h1>Music</h1>
</div>
@php
$data = json_decode($json_data); // Decode the JSON data passed from the controller
$user_id = json_decode($user_id);
@endphp
@foreach($data as $i)
<section class="activities">
    <div class="box-container">
      <div class="box">
        <div class="content">
          <h3>{{ $i->product_image }}</h3>
          <h3><i class="fas fa-dollar-sign"></i> {{ $i->product_price }}</h3>
          
          <!-- Music player -->
          <audio controls>
              <source src="lofi/{{ $i->product_image }}" type="audio/mpeg">
              Your browser does not support the audio element.
          </audio>

          <!-- Add to Cart Form -->
          <form action="add_to_cart" method="POST" class="addItem">
            @csrf
            <input type="hidden" name="product_id" value="{{ $i->id }}" required>
            <input type="hidden" name="user_id" value="{{ $user_id }}" required>
            <input type="submit" value="Add to Cart" class="btn" name="addItem">
          </form>
        </div>
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
        window.location.href = 'music?user_id={{ $user_id }}';
    </script>
@endif
