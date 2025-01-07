{{-- <x-app-layout> --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Profile</title>

    <link rel="stylesheet" href="dash.css">
    <style>
                /* Custom Padding for Profile Information Section */
        .custom-profile-padding {
            padding: 1.5rem 2rem;  /* Adjust the padding as needed */
        }

        /* Custom Padding for Update Password Section */
        .custom-update-padding {
            padding: 2rem 2.5rem;  /* Adjust the padding as needed */
        }

        /* Custom Padding for Delete User Section */
        .custom-delete-padding {
            padding: 1rem 1.5rem;  /* Adjust the padding as needed */
        }

        /* Custom Styles */
        .bg-black {
            background-color: #111111; /* Darker black background */
        }

        .shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15); /* Deeper shadow for more contrast */
        }

        /* More Rounded Corners */
        .custom-rounded-lg {
            border-radius: 1.25rem; /* Increased roundness */
        }

        /* Adjusted Padding */
        .p-6 {
            padding: 1.5rem; /* For Profile Info */
        }

        .p-4 {
            padding: 1rem; /* For Update Password */
        }

        .p-8 {
            padding: 2rem; /* For Delete User */
        }

        .sm\\:p-10 {
            padding: 2.5rem; /* Larger padding on larger screens */
        }

        .sm\\:p-12 {
            padding: 3rem; /* Even larger padding */
        }

                /* Add space between sections */
        .custom-profile-padding,
        .custom-update-padding,
        .custom-delete-padding {
            margin-bottom: 2rem; /* Increase margin bottom to create space */
        }

        /* Ensure no extra margin is added to the last section */
        .custom-delete-padding {
            margin-bottom: 0;
        }



    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <h2>DASHBOARD</h2>
            <nav>
                <ul>
                    <li>
                        <a href="/dashboard?user_id={{ $user_id }}" class="menu-link">
                            <img src="dash-icon.png" alt="Home"> Home
                        </a>
                    </li>
                    <li>
                        <a href="/home?user_id={{ $user_id }}" class="menu-link">
                        <img src="shop-icon.png" alt="Shop"> Shop
                        </a>
                    </li>
                    <li>
                        <a href="/note?user_id={{ $user_id }}" class="menu-link">
                        <img src="notes-icon.png" alt="Notes"> Notes
                        </a>
                    </li>
                    <li><a href="/logout" class="menu-link">Log out</a></li>
                    <li><div class="status">
                        <a href="/index?user_id={{ $user_id }}" class="env-link">
                        <button class="active-indicator"></button> study env
                        </a>
                    </div></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <header class="header">
                <a href="/profileEdit?user_id={{ $user_id }}" class="profile-link">
                    <img src="{{$user->profile_pic}}" alt="" class="profile-image">
                    <h3>{{ $user->email }} Profile</h3>
                </a>
                
            </header>
            {{-- //DIFFERENT FOR PAGES// --}}
                {{-- <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12"> <!-- Increased space-y-6 to space-y-12 -->
                        
                        <!-- Profile Information Section -->
                        <div class="custom-profile-padding bg-black shadow custom-rounded-lg">
                            <div class="max-w-xl">
                                @include('update-profile-information-form')
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="content">
                    <h3>Email: {{ $user->email }}</h3>
                    <h3>Points: <span class="badge badge-success">{{ $user->points }}</span></h3>
                </div>
                
                
                
                
{{-- </x-app-layout> --}}

