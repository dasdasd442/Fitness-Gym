@extends('layouts.main-page-layout')
@section('content')
<!-- Showcase -->
<section class="showcase1">
    <div class="container grid">
        <div class="showcase-text">
        </div>
        <div class="showcase-text">
            <h1 class="home-banner-h1 xl text-center">Location and Pricing</h1>
            <h2 class="text-center md">~California Fitness Gym~</h2>
        </div>
    </div>
</section>

<!--head -->
<section class="cloud bg-primary py-3">
    <div class="container grid slideInFromBottom">
        <div>
            <h1 class="xl"><i class="fa fa-map-marker-alt icons"></i>Our Location</h1>
            <p class="lead">Elizabeth's Happy Corner Remedio Compound, 826 Gov. M. Cuenco Ave, Nasipit Tambalan, Cebu City, 6000 Cebu</p>
        </div>
        <img src="images/location.jpg" />
    </div>
</section>

<!--sub head -->
<section class="cloud bg-light py-3">
    <div class="container grid">
        <img src="images/home-bg.jpg" />
        <div>
            <h1 class="xl"><i class="fas fa-cog"></i>Membership Options</h1>
            <p class="lead">Our nationally certified trainers are here to help you get into shape easier and faster than ever. Plans designed to meet your fitness needs.</p>
        </div>
    </div>
</section>

<!-- Plans -->
<section class="dif-classes">
    <h2 class="lg text-center my-2">
        What's your plan?
    </h2>
    <div class="container flex plan-card">
        <div class="card">
            <h1 class="md"><i class="fas fa-address-card"></i>
                Regular Membership Package</h1>
            <h4 class="md text-support">Php 699.99<span class="sm">/ Monthly</span></h4>
            <img src="images/boxing-1.jpg"/>
            <div  class="text-left">
                <ul class=text-left>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of Wi-Fi for 30 minutes</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of the Shower Room</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of the Gym</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of Locker</li>
                    <li><i class="fas fa-check-circle icons"></i>SUPPORT</li>
                    <li><i class="fas fa-check-circle icons"></i>100% Guaranteed results!</li>
                </ul>
            </div>
            <a href="{{ route('mainpage-sign-up') }}" class="btn btn-primary">Sign Up Now!</a>
        </div>
        <div class="card">
            <h1 class="md"><i class="far fa-address-card"></i>
                Premium Membership Package</h1>
            <h4 class="md text-support">Php 999.99<span class="sm">/ Monthly</span></h4>
            <img src="images/muay-thai-1.jpg"/>
            <div  class="text-left">
                <ul>
                    <li><i class="fas fa-check-circle icons"></i>Higher Priority of the Gym</li>
                    <li><i class="fas fa-check-circle icons"></i>Guided by a Professional Trainer</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of UNLIMITED Wi-Fi</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of the Shower Room</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of the Gym</li>
                    <li><i class="fas fa-check-circle icons"></i>Free Use of Locker</li>
                    <li><i class="fas fa-check-circle icons"></i>SUPPORT</li>
                    <li><i class="fas fa-check-circle icons"></i>100% Guaranteed results!</li>
                </ul>
            </div>
            <a href="{{ route('mainpage-sign-up') }}" class="btn btn-primary">Sign Up Now!</a>
        </div>
    </div>
</section>
@endsection