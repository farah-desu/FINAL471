<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Swiper CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
@extends('design.main')

@section('main-section')
<!-- Profile Header Section kbhjvghvghcgcfg -->
<div class="heading" style="background: url(pic/pp.jpg) no-repeat;">
    <h1>User Profile</h1>
</div>
@php
$user_id= json_decode($user_id);            
$data = json_decode($data); // Decode the JSON data passed from the controller
$user_info = json_decode($user_info); 
$profile_pics = json_decode($profile_pics); 
@endphp
<!-- User Info Section -->
<section class="user-profile">
    <div class="box-container">
        <div class="box">
            <div class="image">
                <!-- Show profile picture, use a default if not set -->
                <img src="{{$user_info->profile_pic}}" alt="" class="profile-image">
            </div>
            <div class="content">
                <h3>Email: {{ $user_info->email }}</h3>
                <h3>Points: <span class="badge badge-success">{{ $user_info->points }}</span></h3>

                <!-- Profile Picture Selection Form -->
                <form action="profileUpdate" method="POST" class="profile-pic-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_info->id }}">

                    <div class="form-group">
                        <label for="profile_pic">Choose Profile Picture:</label>
                        <select name="profile_pic" id="profile_pic" class="form-select" required>
                            <option value="">Select a Profile Picture</option>
                            @foreach($profile_pics as $i)
                                <option value="{{ $i->product_image }}" 
                                    {{ $user_info->profile_pic == $i->product_name ? 'selected' : '' }}>
                                    {{ $i->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Set as Profile Picture
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<h4 class="centered-heading"><i class="fas fa-star"></i> Features Unlocked:</h4>
@foreach($data as $feature)
<section class="activities">
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="{{ $feature->product_image }}" alt=""> 
            </div>
            <div class="content">
                <h3>{{ $feature->product_name }}</h3>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection

</body>
</html>
