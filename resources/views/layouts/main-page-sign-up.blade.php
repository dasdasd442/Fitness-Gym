@extends('layouts.main-page-layout')
@section('content')
<!-- form -->
<section class="showcase1">
    <div class="container grid">
        <div class="showcase-text">
            <h1 class="home-banner-h1">Dare to be great. Commit to be fit.</h1>
            <p>At California Fitness, we truly care about each and every client’s success. We’ll work with you to help you achieve your health and fitness goals. Personal training, nutritional plans, support, home workouts…we’ll stick with you through it all. Let’s do this…together.</p>
            <a href="{{ route('mainpage-about') }}" class="btn btn-outline" style="margin-right: 5%;">Read More</a>
        </div>
        <div class="showcase-form sign-up card">
            <h2>Welcome, Future Gymer!</h2>
            <form>
                <div class="form-control">
                    <input type="text" name="user_name" placeholder="Full Name" required>
                </div>
                <div class="form-control">
                    <input type="text" name="user_age" placeholder="Age" required>
                </div>
                <div class="form-control">
                    <input type="email" name="user_email" placeholder="Email" required>
                </div>
                <div class="form-control">
                    <input type="password" name="user_password" placeholder="Password" required>
                </div>
                <input type="submit" value="Create Account" class="btn btn-primary fullbtn">
            </form>
            <div class="dont-have-an-account">
               Already have an account?
                <a href="{{ route('mainpage-index') }}">Log In</a>
            </div>
        </div>
        <div>
        </div>
    </div>
</section>
@endsection