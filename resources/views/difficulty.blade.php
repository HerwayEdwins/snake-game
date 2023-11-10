@extends('layouts.app')

@section('title', 'Snake')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sssnake!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('{{asset("assets/images/snake-game-1680-x-1050-background-6syqer1fr6oahe0b.jpg")}}') no-repeat center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        .welcome-page {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .welcome-content {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 36px;
            margin: 0;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #b3ce3f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #95b105;
        }

        .difficulty-selection {
            margin-top: 20px;
        }

        .difficulty-button {
            padding: 10px 20px;
            background-color: #b3ce3f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px;
            transition: background-color 0.3s;
        }

        .difficulty-button:hover {
            background-color: #95b105;
        }
        .navbar {
            background-color: #91b104;
            color: white;
            text-align: right;
            padding: 5px;
            width: 100%;
        }
        .navbar .a {
            text-decoration: none;
            color: #fff;
        }
        .navbar .a:hover {
            color: #3a3a3a;
        }

    </style>
</head>
<body>

    <div class="navbar">
        <h1><a href="{{ url('logout') }}" class="a"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >Logout</a></h1>

    </div>
    <div class="welcome-page">
        <div class="welcome-content">
            <h1>Welcome to Sssnake!</h1>
            <div class="difficulty-selection">
                <h2>Select Difficulty:</h2>
                <a href="{{url('gameplay-easy')}}" class="difficulty-button">Easy</a>
                <a href="{{url('gameplay-medium')}}" class="difficulty-button">Medium</a>
                <a href="{{url('gameplay-hard')}}" class="difficulty-button">Hard</a>
            </div>
        </div>
    </div>
</body>
</html>



    <a href="{{ url('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >Logout</a>
    <form action="{{route('logout') }}" method='post' id='logout-form'>@csrf</form>
@endsection
