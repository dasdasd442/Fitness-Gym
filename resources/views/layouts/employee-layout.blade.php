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

    <style>
        .btn-secondary {
            background-color: #858796;
            border-color: #858796;
        }
        .btn-danger {
            background-color: #e74a3b;
            border-color: #e74a3b;
        }
        .disable_focus:focus {
            outline: none;
        }
        .showMe {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transform: scale(1.1);
            transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
        }
        .showMe-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 1rem 1.5rem;
            width: 24rem;
            border-radius: 0.5rem;
        }
        .show-showMe {
            opacity: 1;
            visibility: visible;
            transform: scale(1.0);
            transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
            z-index: 1000;
        }
        .showMe h1 {
            margin-bottom: 0px;
        }
    </style>
    <title>California Fitness Gym | Dashboard</title>
</head>


@if (session('msg') == 'Added Successfully!')
  <body id="page-top" onload="toggleModal('Added Successfully!')">
@elseif (session('msg')  == 'Removed Successfully!')
  <body id="page-top" onload="toggleModal('Removed Successfully!')">
@elseif (session('msg')  == 'Updated Successfully!')
  <body id="page-top" onload="toggleModal('Updated Successfully!')">
@elseif (session('msg')  == 'Cannot Perform Action!')
  <body id="page-top" onload="toggleModal('Cannot Perform Action!')">
@else
  <body id="page-top">
@endif

<div class="showMe">
  <div class="showMe-content">
      <h1 style="text-align: center; "></h1>
  </div>
</div>



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
                    <li><a href="{{ route('employee.index') }}" class="active">Dashboard</a></li>
                    <li><a href="../index.html">Logout</a></li>
                </ul>
            </nav>
            <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
            <div class="submenu">
                <ul>
                    <li><a href="{{ route('employee.index') }}">Dashboard</a></li>
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
                <p class="lead">California Fitness Gym | Employee</p>
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
                        <li><a href="{{ route('employee.transaction') }}" >Transactions</a></li>
                        <li><a href="{{ route('employee.index') }}#california-customers">California Customers</a></li>
                        <li><a href="{{ route('employee.index') }}#california-classes" >California Classes</a></li>
                        <li><a href="{{ route('employee.index') }}#california-shop" >California Shop</a></li>
                        <li><a href="{{ route('employee.index') }}#entry-log" >Entry log</a></li>
                        <li><a href="{{ route('employee.index') }}#settings" >Your Settings</a></li>
                    </ul>
                </nav>

            </div>



            @yield('content')






        </div>
    </section>
    

            @yield('transaction-content')


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
                    <li><a href="{{ route('employee.index') }}">Dashboard</a></li>
                    <li><a href="#">Logout</a></li>
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

        function filterCustomers(e, what) {
            let x = e.value.toUpperCase();
            let rows = document.querySelectorAll(what);

            for (let i = 0; i < rows.length; i++) {
              if (rows[i].firstElementChild.innerText.toUpperCase().match(x)) {
                  rows[i].style.display = 'table-row';
              } else {
                  rows[i].style.display = 'none';
              }
          }
        }

        let modal = document.querySelector('.showMe');
        console.log(modal);
        function toggleModal(say) {
            modal.classList.toggle("show-showMe");
            let what = modal.firstElementChild;
            
            what.style.color = (say == 'Cannot Perform Action!') ? '#d9534f' : '#5cb85c';

            what = what.firstElementChild;
            what.textContent = say;

            setTimeout(() => {
                modal.classList.remove("show-showMe");
            }, 1000);
        }
    </script>
</body>
</html>
