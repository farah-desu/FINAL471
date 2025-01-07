<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: Link to a CSS file for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #7c045a;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #7c045a;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
@php
$user_id= json_decode($user_id);            
@endphp
<body>
   
    <div class="container">
        <h1>Thank You!</h1>
        <p>You have purchased features successfully.</p>
        <a href="home?user_id={{$user_id}}">Return to Homepage</a>
    </div>
</body>
</html>
