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
    <style>
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
                    <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                    <li><a href="{{ route('customer.shop') }}" >Shop</a></li>
                    <li><a href="{{ route('customer.index') }}" class="active">Dashboard</a></li>
                    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                </ul>
            </nav>
            <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
            <div class="submenu">
                <ul>
                    <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                    <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
                    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- dashboard header -->
    <section class="dashboard-header bg-primary py-3">
        <div class="container grid">
            <div class="slideInFromLeft">
                <h1 class="xl">Welcome to Dashboard</h1>
            <p class="lead">California Fitness Gym | {{ $customer->customer_name }} | {{ $customer->customer_id }}</p>
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
                        <li><a href="{{ route('customer.shop') }}">California Shop</a></li>
                        <li><a href="#settings">Your Settings</a></li>
                    </ul>
                </nav>

            </div>

            <div>
                <!-- Membership -->
                <div id="membership" class="card m-5-bottom">
                    <h2><i class="fas fa-address-card icons"></i>Membership Subscription Details</h2>
                    <div class="alert alert-success">
                        <i class="fas fa-info"></i>
                        @if ($customer->customer_status == 'Premium' || $customer->customer_status == 'Regular')
                            {{ $customer->customer_status }} Membership Subscription
                        @else
                            {{ $customer->customer_status }}
                        @endif
                    </div>
                    <div class="alert alert-success">
                        <i class="fas fa-info"></i>
                        @if ($subscribed_on)
                            Last Subscribed in {{ $subscribed_on }}
                        @else
                            Last Subscribed in the early days of humanity.
                        @endif
                    </div>
                    <div class="alert alert-success">
                        <i class="fas fa-info"></i>
                        @if ($expires_on)
                            Latest Subscription expires in {{ $expires_on }}
                        @else
                            Latest Subscription expired in the early days of humanity.
                        @endif
                    </div>
                    <div class="alert alert-error">
                        <i class="fas fa-info"></i>
                        Expires in exactly {{ $customer->membership_expires_in }} days.
                    </div>
                </div>

                <!-- Your Classes -->
                <div id="your-classes" class="card m-5-bottom">
                    <h2><i class="fas fa-hotel icons"></i>Joined Classes</h2>
                    <div class="container grid grid-2">
                        @foreach ($classes as $class)
                            <div class="card cursor" data-toggle="modal" data-target="#classes{{ $class->id }}">
                                <h4>{{ $class->class_name}}</h4>
                                <img src="../{{ $class->class_image }}"/>
                            </div>
                        @endforeach           
                    </div>
                </div>

                <!-- Settings -->
                <div id="settings" class="card m-5-bottom">
                    <h2><i class="fas fa-user-cog icons"></i>Your Personal Settings</h2>
                        <div class="form-control">
                            <input type="email" name="email" placeholder="Email: {{ $customer->email }}" required disabled>
                            <button class="btn btn-primary half-btn" data-toggle="modal" data-target="#myModal3">Update Email</button>
                        </div>
                        <div class="form-control">
                            <input type="password" name="password" placeholder="Password: {{ $customer->password }}" required disabled>
                            <button class="btn btn-primary half-btn" data-toggle="modal" data-target="#myModal4">Update Password</button>
                        </div>
                </div>



                <!--------------------------- MODAL FOR JOINED CLASSES --------------------------->

                <!-- CLASS 1 -->
                @foreach ($classes as $class)
                    <div id="classes{{ $class->id }}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <h2 class="modal-title"><i class="fas fa-info-circle icons md"></i>{{ $class->class_name }} Class</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <div id="modRow" class="d-flex justify-content-center row">
                                <div class="col">
                                    <div class="grid grid-2">
                                        <img src="../{{ $class->class_image }}" />
                                        <div>
                                            <h2>Schedule:<span class="text-support m-2">{{ $class->class_schedule }}</span></h2>
                                            <h2>Time: <span class="text-support m-2">{{ $class->class_time }}</span></h2>
                                            <h2>Instructor: <span class="text-support m-2">{{ $class->employee_name }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                        </div>
                    </div>
                    
                @endforeach

                <!--------------------------- MODAL FOR PERSONAL SETTING --------------------------->
                <!-- Email -->
                <div id="myModal3" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2 class="modal-title"><i class="fas fa-plus icons md"></i>Update</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <div id="modRow" class="d-flex justify-content-center row">
                            <div class="col">
                                <form action="{{ route('c-update-email') }}" method="POST">
                                    @csrf
                                    <div class="form-control">
                                        <input class="full" type="email" name="email" placeholder="Enter New Email" required>
                                    </div>
                                    <input type="submit" value="Update Email" class="btn btn-primary fullbtn" />
                                </form>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Password -->
                <div id="myModal4" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2 class="modal-title"><i class="fas fa-plus icons md"></i>Update</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <div id="modRow" class="d-flex justify-content-center row">
                            <div class="col">
                                <form action="{{ route('c-update-password') }}" method="POST">
                                    @csrf
                                    <div class="form-control">
                                        <input class="full" type="password" name="password" placeholder="Enter New Password" required>
                                    </div>
                                    <div class="form-control">
                                        <input class="full" type="password" name="confirm_password" placeholder="Re-enter Password" required>
                                    </div>
                                    <input type="submit" value="Update Password" class="btn btn-primary fullbtn" />
                                </form>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                    </div>
                </div>

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
                    <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                    <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
                    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
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
