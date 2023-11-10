


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake Game - Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: url('{{asset("assets/images/snake-game-1680-x-1050-background-6syqer1fr6oahe0b.jpg")}}') no-repeat center fixed;
            background-size: cover;
        }

        .navbar {
            background-color: #91b104;
            color: white;
            text-align: center;
            padding: 5px;
            width: 100%;
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

        .form-group .signup-link {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Email Verification</h1>
    </div>
    <div class="container">
    <p>An email has been sent to your inbox/spam. verify or die</p>
    <p>If you did not receive an email verification, click here to request another</p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            A new email verification link has been emailed to you!
        </div>

    @endif
    <form action="{{route('verification.send')}}" method='post'>@csrf
        <input type="submit" value="another email">
    </form>

    </div>
</body>
</html>
