@extends('layouts.main-page-layout')
@section('content')
<!-- showcase -->
<section class="showcase">
    <div class="container grid">
        <div class="showcase-text">
        </div>
        <div class="showcase-text">
            <h1 class="home-banner-h1 xl text-center">Available Classes</h1>
            <h2 class="text-center md">~California Fitness Gym~</h2>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats">
    <div class="container">
        <h3 class="stats-heading text-center md">
            Current Available Classes for the Month
        </h3>
    </div>
</section>

<!-- classes -->
<section class="dif-classes" style="margin-top: 30px">
    <div class="container">
        <div class="class-overflow ">
            @foreach ($classes as $class)
                <div class="card .classes-height flex-items-1">
                        <div>
                            <h4 class="text-support">Starts at Php {{ number_format($class->class_price, 2, '.', ',') }}<span class="sm">/ Monthly</span></h4>
                            <h3 class="class_title">{{ $class->class_name }}</h3>
                            <p class="counter">Currently Enrolled-{{ $class->class_cur_number }}/{{ $class->class_max_number }}</p>
                            <img src="{{ $class->class_image }}" height="200px" >
                        </div>
                        <div class="classdesc" style="height: auto; margin-bottom: 5%;">
                            <p>{{ $class->class_description }}</p>
                            <h4 class="text-left">Includes:</h4>
                            <ul class="include">
                                <li><i class="fas fa-check-circle icons"></i>Personal Trainer</li>
                                <li><i class="fas fa-check-circle icons"></i>High Quality Muay-Thai Equipment</li>
                            </ul>
                        </div>
                        <a href="{{ route('mainpage-sign-up') }}" class="enroll">Enroll Now</a>
                        <div class="sched">
                        <h4 >Schedule</h4>
                            <ul class="include sched">
                                <li><b>Days: </b> {{ $class->class_schedule }}<br><b>Time: </b> ({{ $class->class_time }})</li>
                                <li><b>Instructor: </b> {{ $class->employee_name }}</li>
                            </ul>
                        </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection