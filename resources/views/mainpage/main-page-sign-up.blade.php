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
            <form action="{{ route('mainpage-signup-submit') }}" method="POST">
                @csrf
                <div class="form-control">
                    @if (session('error') == 'Email is already taken.')
                        <input type="text" name="customer_name" placeholder="Full Name" required value="{{ session('customer_name') }}">
                    @else
                        <input type="text" name="customer_name" placeholder="Full Name" required>
                    @endif
                </div>
                <div class="form-control">
                    @if (session('error') == 'Email is already taken.')
                        <input type="text" name="customer_age" placeholder="Age" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ session('customer_age') }}">
                    @else
                        <input type="text" name="customer_age" placeholder="Age" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    @endif
                </div>
                <div class="form-control">
                   @if (session('error') == 'Email is already taken.')
                    <label style="margin-left: 5px; color: #d9534f;">Email is already Taken.</label>
                    <input type="email" name="email" placeholder="Email" required style="border: 2px solid #d9534f;">
                   @else
                   <input type="email" name="email" placeholder="Email" required>
                   @endif
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password" required>
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