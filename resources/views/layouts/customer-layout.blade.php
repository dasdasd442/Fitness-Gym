<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <title>California Fitness Gym | Dashboard</title>
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
                    <li><a href="user-classes.html">Classes</a></li>
                    <li><a href="user-shop.html">Shop</a></li>
                    <li><a href="user-index.html" class="active">Dashboard</a></li>
                    <li><a href="../index.html">Logout</a></li>
                </ul>
            </nav>
            <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
            <div class="submenu">
                <ul>
                    <li><a href="user-shop.html">Shop</a></li>
                    <li><a href="user-classes.html">Classes</a></li>
                    <li><a href="user-index.html">Dashboard</a></li>
                    <li><a href="../index.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- dashboard header -->
    <section class="dashboard-header bg-primary py-3">
        <div class="container grid">
            <div class="slideInFromLeft">
                <h1 class="xl">Welcome to Dashboard</h1>
                <p class="lead">California Fitness Gym | Hansel</p>
            </div>
            <i class="fas fa-folder-open slideInFromRight"></i>
        </div>
    </section>

    <!-- dashboard grid of cards -->
    <section class="dashboard-main my-4 slideInFromBottom">
        <div class="container grid">

            <!-- Navigation Menu -->
            <div class="card bg-light p-3">
                <h3 class="my-2">Navigation Menu</h3>
                <nav>
                    <ul>
                        <li><a href="#membership">Your Subscription</a></li>
                        <li><a href="#your-classes">Your Classes</a></li>
                        <li><a href="{{ route('customer.classes') }}">Available Classes</a></li>
                        <li><a href="user-shop.html">California Shop</a></li>
                        <li><a href="#settings">Your Settings</a></li>
                    </ul>
                </nav>

            </div>

            @yield('content')


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
                    <li><a href="user-shop.html">Shop</a></li>
                    <li><a href="user-classes.html">Classes</a></li>
                    <li><a href="user-index.html">Dashboard</a></li>
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
