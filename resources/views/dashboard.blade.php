<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Profile</title>

    <link rel="stylesheet" href="dash.css">
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
            <section class="main-content">
                <div class="welcome">
                    <h2>Welcome to Mood!</h2>

                    <div class="calendar-container">
                        <header class="calendar-header">
                            <p class="calendar-current-date"></p>
                            <div class="calendar-navigation">
                                <span id="calendar-prev" 
                                        class="material-symbols-rounded">
                                        ⬅️
                                </span>
                                <span id="calendar-next" 
                                        class="material-symbols-rounded">
                                        ➡️
                                </span>
                            </div>
                        </header>
                        <div class="calendar-body">
                            <ul class="calendar-weekdays">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="calendar-dates"></ul>
                        </div>
                    <script src="calender.js">    
                        // Injected from the backend
                    </script>
                    {{-- <div class="study-hours-legend">
                        <div class="legend-container">
                            <div class="legend-item">
                                <div class="color-box" style="background-color: rgb(210, 210, 240);"></div>
                                <span>3 hrs</span>
                            </div>
                            <div class="legend-item">
                                <div class="color-box" style="background-color: rgb(255, 210, 230);"></div>
                                <span>5 hrs</span>
                            </div>
                            <div class="legend-item">
                                <div class="color-box" style="background-color: rgb(255, 180, 190);"></div>
                                <span>10 hrs</span>
                            </div>
                            <div class="legend-item">
                                <div class="color-box" style="background-color: rgb(255, 120, 150);"></div>
                                <span>12 hrs</span>
                            </div>
                            <div class="legend-item">
                                <div class="color-box" style="background-color: rgb(255, 80, 100);"></div>
                                <span>14 hrs</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                
            </div>
            <div style="width: 50%; margin: auto; background-color: black; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="background-color: rgb(0, 0, 0); padding: 15px; border-radius: 5px;">
            <div class="container">
                <h2>To-Do List</h2>
            
                <section class="main-content">
                    <!-- Notes section -->
                    <div class="notes">
                        <form action="/todo_add" method="post" class="add-review">
                            @csrf
                            <div class="flex">
                                <div class="inputBox">
                                    <span>Enter To do:</span>
                                    <textarea placeholder="Enter your to do" name="todos" required></textarea>
                                    <input type="hidden" name="user_id" value="{{ $user_id }}" required>
                                </div>
                            </div>
                            <input type="submit" value="Submit" class="btn" name="add-review">
                        </form>
                        @foreach($data as $i)
                            <section class="reviews">
                                <div class="box-container">
                                    <div class="box">
                                        <p>To-Do:</p>
                                        <h3>{{ $i->title }}</h3>
                                    </div>
                                </div>
                            </section>
                            @endforeach
                    </div>
                </section>
            </div>
            
            </section>
        </main>
    </div>


   
</body>
</html>
