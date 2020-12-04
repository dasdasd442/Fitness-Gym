<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <style>
        .dif-classes .card:hover {
            transform: scale(1.02);
        }
    </style>
    <title>California Fitness Gym | Classes</title>
</head>
<body>
    <a class="top-link hidescroll" href="#" id="js-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6"><path d="M12 6H0l6-6z"/></svg>
        <span class="screen-reader-text">Back to top</span>
      </a>
    <!-- navbar -->
    <div class="navbar">
        <div class="container flex">
            <h1 class="logo">California Fitness Gym</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('customer.classes') }}" class="active">Classes</a></li>
                    <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
            <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
            <div class="submenu">
                <ul>
                    <li><a href="{{ route('customer.classes') }}" class="active">Classes</a></li>
                    <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li><a href="{{ route('customer.index') }}" class="active">Dashboard</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

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
        <div class="class-overflow" style="overflow-y: hidden;">
            @foreach ($classes as $class)
                <div class="card .classes-height flex-items-1">
                        <div>
                            <h4 class="text-support">Starts at Php {{ number_format($class->class_price, 2, '.', ',') }}<span class="sm">/ Monthly</span></h4>
                            <h3 class="class_title">{{ $class->class_name }}</h3>
                            <p class="counter">Currently Enrolled-{{ $class->class_cur_number }}/{{ $class->class_max_number }}</p>
                            <img src="../{{ $class->class_image }}" height="200px" >
                        </div>
                        <div class="classdesc" style="height: auto; margin-bottom: 5%;">
                            <p>{{ $class->class_description }}</p>
                            <h4 class="text-left">Includes:</h4>
                            <ul class="include">
                                <li><i class="fas fa-check-circle icons"></i>Personal Trainer</li>
                                <li><i class="fas fa-check-circle icons"></i>High Quality Muay-Thai Equipment</li>
                            </ul>
                        </div>
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
















    <!-- footer -->
    <footer class="footer bg-dark py-5">
        <div class="container grid grid-4">
            <div>
                <h1>California Fitness Gym</h1>
                <p>Copyright &copy; 2020.</p>
            </div>
            <nav>
                <h2>Links</h2>
                <ul>
                    <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                    <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
                    <li><a href="../index.html">Logout</a></li>
                </ul>
            </nav>
            <div>
                <h2>Contact</h2>
                <i class="fas fa-phone" style="font-size: 20px;"></i>
                <span>0927-393-667</span>
                <br />
                <i class="fas fa-envelope" style="font-size: 20px;"></i>
                <span>california01@fitness.com</span>
                <br />
                <i class="fas fa-map-marker-alt" style="font-size: 22px;"></i>
                <span>Nasipit Tambalan, Cebu City, 6000 Cebu</span>
            </div>
            <div>
                <h2>Why California</h2>
                <p>At California Fitness, we truly care about each and every client’s success. We’ll work with you to help you achieve your health and fitness goals. Personal training, nutritional plans, support, home workouts…we’ll stick with you through it all. Let’s do this…together.</p>
            </div>
            <div class="social">
                <a href="https://twitter.com/Hanseeell" class="twitter"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="https://www.facebook.com/Hansel.Cesa/" class="fb"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="https://www.instagram.com/haaanseeell/" class="insta"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="https://www.linkedin.com/in/hans-adey-cesa-3894b8148/" class="linkedin"><i class="fab fa-linkedin fa-2x"></i></a>
            </div>
        </div>
    </footer>


    <script>
        function showSubmenu() {
            let submenu = document.querySelector('.submenu');
            console.log(submenu);
            submenu.classList.toggle('show');
        }

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            let mybutton = document.getElementById("js-top");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.classList.add("showscroll");
                mybutton.classList.remove("hidescroll");
            } else {
                mybutton.classList.remove("showscroll");
                mybutton.classList.add("hidescroll");
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>
    