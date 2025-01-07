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

<style>
.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
    display: block;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

</style>



</head>
<body>


<section class="review">
    <h1 class="heading-title">Log in</h1>
    <div class="imgcontainer">
        <img src="pic/log.jpg" alt="">
      </div>
    <form action="/login_home" method="post" class="add-review">
        @csrf
        <div class="flex">
            <div class="inputBox">
                <span>Email :</span>
                <input type="email" placeholder="Enter your mail" name="email" required>
            </div>
            <div class="inputBox">
                <span>Password :</span>
                <input type="password" placeholder="Enter your password" name="psw" required>
            </div>
        </div>
        <input type="submit" value="submit" class="btn" name="add-review">
        <a href="signup">
            <input type="button" value="Sign up" class="btn"  name="add-review">
        </a>
        
    </form>
</section>






</body>
</html>


</body>
</html>
@if(session('message'))
    <script>
        alert('{{ session('message') }}');
        window.location.href = 'login';
    </script>
@endif


