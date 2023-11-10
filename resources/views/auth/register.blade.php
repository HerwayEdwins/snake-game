<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake Game - Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('{{asset("assets/images/snake-game-1680-x-1050-background-6syqer1fr6oahe0b.jpg")}}') no-repeat center fixed;
            background-size: cover;
        }

        .container {
            background-color: #b3ce3f;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 320px;
            text-align: center;
        }

        .container h2 {
            margin-top: 0;
        }

        .form-group {
            margin: 20px 0;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirm:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>
