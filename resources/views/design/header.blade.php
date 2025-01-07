<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="header">
    <a href="home?user_id={{ $user_id }}" class="logo">Mood</a>
    <nav class="navbar">
        <a href="home?user_id={{ $user_id }}">Shop Home</a>
        <a href="review_22301483?user_id={{ $user_id }}">reviews</a>
        <a href="index?user_id={{ $user_id }}">Study env</a>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">shop features</a>
            <div class="dropdown-content">
                <a href="wallpaper?user_id={{ $user_id }}">Wallpaper</a>
                <a href="music?user_id={{ $user_id }}">music</a>
                <a href="profilePic?user_id={{ $user_id }}">Profile picture</a>
            </div>
        </li>

        <!-- Cart Link with Form -->
        <a href="javascript:void(0)" class="nav-link" onclick="submitForm()">
            <i class="fas fa-shopping-cart"></i> 
            <span id="cart-item" class="badge badge-danger"></span>
        </a>
        <!-- Form to pass user_id -->
        <form action="cart_22301483?user_id={{ $user_id }}" method="POST" class="addItem" id="cart-form" style="display: none;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}" required>
        </form>
        <a href="profile?user_id={{ $user_id }}"><i class="fa-solid fa-user"></i></a>
        <a href="dashboard?user_id={{ $user_id }}">DashBorad</a>
    </nav>
</section>

<script>
    // Function to submit the form when the cart icon is clicked
    function submitForm() {
        document.getElementById("cart-form").submit();
    }
</script>
</body>
</html>
