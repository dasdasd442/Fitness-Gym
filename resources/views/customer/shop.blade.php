<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <title>California Fitness Gym | The Shop</title>
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
                <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                <li><a href="{{ route('customer.shop') }}" class="active">Shop</a></li>
                <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
        <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
        <div class="submenu">
            <ul>
                <li><a href="{{ route('customer.classes') }}">Classes</a></li>
                <li><a href="{{ route('customer.shop') }}">Shop</a></li>
                <li><a href="{{ route('customer.index') }}">Dashboard</a></li>
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
              <h1 class="home-banner-h1 xl text-center">The California Shop</h1>
              <h2 class="text-center md">~California Fitness Gym~</h2>
          </div>
      </div>
    </section>


    <!-- Stats -->
    <section class="stats">
        <div class="container">
            <h3 class="stats-heading text-center md">
                Product and Supplements
            </h3>
        </div>
    </section>

    <!-- PRODUCTS -->
    <div id = "prodDiv" class="container grid grid-4 top-align">
  
      @foreach ($products as $product)
        <div id="{{ $product->product_id }}" class="p-md-3 separate cursor" data-toggle="modal" data-target="#product{{ $product->product_id }}">
          <img src="images/alfamo.jpg" alt="alfamo">
          <h2>
            {{ $product->product_name }}
          </h2>
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#product{{ $product->product_id }}">Product Description</button>
          <!-- Modal -->
          <div id="product{{ $product->product_id }}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title">{{ $product->product_name }}</h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div id="modRow" class="d-flex justify-content-center row">
                    <div id="picForm" class="col pt-5">
                      <img src="../{{ $product->product_image }}" alt="alfamo">
                      <h3>Price: Php {{ $product->product_price }}</h3>
                      <h4>Status: 
                          @if ($product->product_status == 'available')
                            <span style="color: #28a745;">
                              {{ $product->product_status }}    
                            </span>
                          @else
                            <span style="color: #dc3545;">
                              {{ $product->product_status }}    
                            </span>
                          @endif
                      </h4>
                      
                        <!-- <form>
                          <div class="form-control">
                              <input type="number" name="itemNo" placeholder="Number of Item" required>
                          </div>
                          <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                        </form> -->
                    
                    </div>
                    <div class="col">
                      <p> {{ $product->product_description }}
                      <br>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
          

        </div>
          
      @endforeach
  

    </div>

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
  </script>
</body>
</html>
