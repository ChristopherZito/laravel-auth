@extends('layouts.main-layouts')
@section('content')
    @auth
        <h1>{{Auth::user() -> name}}</h1>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        @else
        <h1>
            Register to the site
        </h1>
    @endauth
    @guest
        <h1>
            Register
        </h1>

        <form action="{{route('register')}}" method="POST">

            @method("POST")
            @csrf

            <label for="name">Username:</label>
            <input type="text" name="name" ><br>

            <label for="email">Email:</label>
            <input type="email" name="email" ><br>

            <label for="password">Password:</label>
            <input type="password" name="password" ><br>

            <label for="password-confirm">Confirm Password:</label>
            <input type="password" name="password_confirmation" ><br>

            <input type="submit" value="Register">
        </form>

        <br>
        <hr class="bg-white">
        <br>

        <h1>
            Login
        </h1>

        <form action="{{route('login')}}" method="POST">

            @method("POST")
            @csrf


            <label for="email">Email:</label>
            <input type="email" name="email" ><br>

            <label for="password">Password:</label>
            <input type="password" name="password" ><br>

            <input type="submit" value="Login">
        </form>

    @else
    <empl-component></empl-component>
    @endguest
    
@endsection