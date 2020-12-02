@extends('layouts.main-page-layout')
@section('content')
    <!-- Showcase -->
    <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">
                <h1 class="home-banner-h1">Dare to be great. Commit to be fit.</h1>
                <p>At California Fitness, we truly care about each and every client’s success. We’ll work with you to help you achieve your health and fitness goals. Personal training, nutritional plans, support, home workouts…we’ll stick with you through it all. Let’s do this…together.</p>
                <a href="{{ route('mainpage-about') }}" class="btn btn-outline" style="margin-right: 5%;">Read More</a>

                <a href="{{ route('mainpage-sign-up') }}" class="btn btn-outline">Join Now</a>
            </div>
            <div class="showcase-form card">
                <h2>Welcome, Gymers!</h2>
                <form>
                    <div class="form-control">
                        <input type="text" name="user_id" placeholder="User ID" required>
                    </div>
                    <div class="form-control">
                        <input type="password" name="user_password" placeholder="Password" required>
                    </div>
                    <input type="submit" value="LOGIN" class="btn btn-primary fullbtn">
                </form>
                <div class="dont-have-an-account">
                    Don't have an account?
                    <a href="{{ route('mainpage-sign-up') }}">Sign Up</a>
                </div>
            </div>
            <div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats">
        <div class="container">
            <h3 class="stats-heading text-center">
                Your results just got easier with California Fitness! We do the hard work and you do all the heavy lifting. Get the body
                you always wanted today!
            </h3>

            <div class="grid grid-3 text-center my-4">
                <div class="card">
                    <i class="fas fa-universal-access fa-5x"></i>
                    <h3>Beginner</h3>
                    <p>We cater to all experience levels. Don't be shy and see what you're missing.</p>
                </div>
                <div class="card">
                    <i class="fas fa-venus-mars fa-5x"></i>
                    <h3>All Ages</h3>
                    <p>We can train any gender and age level. If you want to have a healthier lifestyle then call us today to find out more.</p>
                </div>
                <div class="card">
                    <i class="fas fa-running fa-5x"></i>
                    <h3>Experienced</h3>
                    <p>We even have more intense workouts for the personal trainer in you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- IDK WHAT SECTION -->
    <section class="cli">
        <div class="container grid">
            <img src="images/image 4.jpg" alt="">
            <div>
                <h3>Weight Training</h3>
                <p>From bodybuilding to powerlifting and everything in between, the Fitness Factory has the equipment to help you reach your goals. With dumbells up to 150lbs, 7 squat racks, 5 deadlift platforms, 2 competition benches, and a variety of plate loaded and pin loaded machines, we have everything you need.</p>
            </div>
            <div>
                <h3>General Fitness</h3>
                <p>If your goals are to improve your overall health and wellness, we have everything you need.  We have cardio equipment spanning two floors including 8 stepmills, 15+ treadmills, row machines, exercise bikes, spin bikes, ellipticals, arc trainers and even a Jacob’s Ladder. In addition to cardio equipment, we have stretching areas with mats, foam rollers, bands, light weights, and much more.</p>
            </div>
        </div>
    </section>
    <section class="cli">
        <div class="container grid">
            <img src="images/image 12.jpg" alt="">
            <div>
                <h3>Functional Training</h3>
                <p>With 60 feet of turf with a sled, stackable plyometric boxes, weighted medicine balls, battle ropes, squat racks, and deadlift platforms our functional training room has all the equipment you need to take your training to the next level.</p>
            </div>
            <div>
                <h3>Group Exercise</h3>
                <p>From early morning to evening classes, our certified instructors will provide you with a challenging, yet fun workout! All levels of fitness are welcome. Check out the schedules below to find a class that meets your needs.</p>
            </div>
        </div>
    </section>

    <!-- location and pricing -->
    <section class="cloud bg-primary my-0 py-2">
        <div class="container grid">
            <div class="text-center">
                <h2 class="lg">Location and Pricing</h2>
                <p class="lead my-1">We are located at Elizabeth's Happy Corner Remedio Compound, 826 Gov. M. Cuenco Ave, Nasipit Tambalan, Cebu City, 6000 Cebu</p>
                <a href="{{ route('mainpage-location') }}" class="btn btn-dark">Read More</a>
            </div>
            <img src="images/image 3.jpg" />
        </div>
    </section>
    <!-- Shop -->
    <section class="cloud bg-primary my-0 py-2">
        <div class="container grid">
            <img src="images/protein-shake.jpg" />
            <div class="text-center">
                <h2 class="lg">Shop product and supplements</h2>
                <p class="lead my-1">
                    If you exercise regularly, you likely want to be sure you’re getting the most out of it.</p>
                <a href="{{ route('mainpage-shop') }}" class="btn btn-dark">Read More</a>
            </div>
        </div>
    </section>

    <!-- classes -->
    <section class="dif-classes">
        <h2 class="md text-center my-2">
            Available Classes
        </h2>
        <div class="container flex flex-wrap">
            @foreach ($classes as $class)    
                <div class="card cursor flex-items" onclick="window.location.href='{{ route('mainpage-classes') }}'">
                    <h4>{{ $class->class_name}}</h4>
                    <img src="{{ $class->class_image }}" height="250px"/>
                </div>
            @endforeach
        </div>
    </section>

    <!-- banner -->
    <section class="cli banner my-0">
        <div class="container">
            <div class="text-center">
                <h1>Get the body you deserve.</h1>
                <a href="{{ route('mainpage-sign-up') }}" class="btn btn-outline-banner">SIGN UP NOW</a>
            </div>
        </div>
    </section>
@endsection