<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notes</title>
    <link rel="stylesheet" href="dash.css">
    <style>
        /* Basic container styling */
        .note-container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Flash Message Styling */
        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* New Note Button */
        .create-note-btn {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .new-note {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .new-note:hover {
            background-color: #0056b3;
        }

        /* Notes Grid */
        .notes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Note Card Styling */
        .note-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .note-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Note Content Styling */
        .note-body {
            padding: 20px;
            color: #333;
        }

        .note-body h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #222;
        }

        .note-body p {
            font-size: 14px;
            color: #555;
        }

        /* Action Buttons Styling */
        .note-actions {
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-btn, .edit-btn, .delete-btn {
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .view-btn {
            background-color: #007bff;
            color: white;
        }

        .view-btn:hover {
            background-color: #0056b3;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        /* Message when no notes are found */
        .no-notes {
            color: #777;
            text-align: center;
        }

        /* Pagination Styling */
        .pagination {
            margin-top: 30px;
            text-align: center;
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
            <section class="main-content">
                <!-- Notes section -->
                <div class="notes">
                    <form action="/note_add" method="post" class="add-review">
                        @csrf
                        <div class="flex">
                            <div class="inputBox">
                                <span>Enter Note:</span>
                                <textarea placeholder="Enter your note" name="note" required></textarea>
                                <input type="hidden" name="user_id" value="{{ $user_id }}" required>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn" name="add-review">
                    </form>
                    
                </div>
            </section>
{{-- to show --}}
@foreach($data as $i)
<section class="reviews">
  <div class="box-container">
    <div class="box">
        <p>Note:</p>
        <h3>{{$i->note}}</h3>
    </div>
  </div>
</section>
@endforeach
</body>
</html>