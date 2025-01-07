<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        form {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        form h2 {
            text-align: center;
            font-size: 1.8rem;
            color: #4f46e5;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            color: #9333ea;
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: #f9fafb;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #9333ea;
            box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.2);
        }

        form button {
            background-color: #4f46e5;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s;
            width: 100%;
            font-size: 1rem;
        }

        form button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.6);
        }

        form a {
            color: #4f46e5;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        form a:hover {
            color: #9333ea;
        }

        .footer {
            width: 100%;
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #1f2937;
            color: #d1d5db;
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.2);
        }

        .footer a {
            color: #9333ea;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #60a5fa;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2>Register</h2>

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <button type="submit">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 <a href="/welcome">MOOD</a>. All Rights Reserved.</p>
    </footer>
</body>
</html>
