<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainpage.css">
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
                    <li><a href="{{ route('mainpage-index') }}">Home</a></li>
                    <li><a href="{{ route('mainpage-location') }}">Location and Pricing</a></li>
                    <li><a href="{{ route('mainpage-classes') }}">Classes</a></li>
                    <li><a href="{{ route('mainpage-shop') }}" class="active">Shop</a></li>
                    <li><a href="{{ route('mainpage-about') }}">About Us</a></li>
                    <li><a href="{{ route('mainpage-sign-up') }}">Sign Up</a></li>
                </ul>
            </nav>

            <a onclick="showSubmenu()" class="burger"><i class="fa fa-bars fa-2x"></i></a>
            <div class="submenu">
                <ul>
                  <li><a href="{{ route('mainpage-index') }}">Home</a></li>
                  <li><a href="{{ route('mainpage-location') }}">Location and Pricing</a></li>
                  <li><a href="{{ route('mainpage-classes') }}">Classes</a></li>
                  <li><a href="{{ route('mainpage-shop') }}" class="active">Shop</a></li>
                  <li><a href="{{ route('mainpage-about') }}">About Us</a></li>
                  <li><a href="{{ route('mainpage-sign-up') }}">Sign Up</a></li>
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
  
      <div id="alfamo" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal1">
        <img src="images/alfamo.jpg" alt="alfamo">
        <h2>
          Alfamo Cooling Towel
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1">Product Description</button>
        <!-- Modal -->
        <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Alfamo Cooling Towel</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-5">
                    <img src="images/alfamo.jpg" alt="alfamo">
                    <h3>Price: Php 500</h3>
                    
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                  
                  </div>
                  <div class="col">
                    <p>
                      - SUFFICIENT SIZE, 40" long by 13" wide, WIDER than competing products.<br>
                      - CHILLS INSTANTLY, Unlike PVA material that drys to cardboard, it is silky soft, pliable, easily folds up & fits into a gym bag. The towel stays chilled for up to 3 hours and it reduces 	body temperature up to 30 degrees. The fabric is pleasant to touch, rather than annoyingly dripping wet. It also provides UPF 50 sunscreen protection<br>
                      - PIONEERING & UNIQUE, As the first adopter of flat plastic ziplock bag with carabiner clip back in year 2015, Alfamo has seen many followers thereafter. You have many choices in 	the first and only cooling towels come with four sizes and multiple eye catching fun colors. The color edge-stitching towels are unique gears for fitness & sports fans in style. Get much more relief from heat with body size extra large towels.<br>
                      - BONUS CARRYING POUCH WITH CARABINER CLIP, With the waterproof plastic case, it’s 	easy to carry the chilly towel on a rock climb, golf trip, corssfit training, etc. The reusable 	pouch is friendly to earth and saves more space than a bottle. The storage case comes with carabiner clips of vibrant colors that match the towel, making it a great gift for all ages. The clip makes it convenient to attach the cooling towel to the belt of sports bag, camping hammock and traveling backpack<br>
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

      <div id="syourself" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal2">
        <img src="images/syourself.jpg" alt="syourself">
        <h2>
          SYOURSELF Microfiber Sports & Travel Towel
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal2">Product Description</button>
        <!-- Modal -->
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">SYOURSELF Microfiber Sports & Travel Towel</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">

                  <div id="picForm" class="col pt-5" >
                    <img src="images/syourself.jpg" alt="alfamo">
                    <h3>Price: Php 425</h3>
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                  </div>

                  <div class="col">
                    <p>
                      - 100% Microfiber<br>
                      - FOUR SIZE FOR YOU: 72"x32", 60"x30", 40"x20", 32"x16", perfect beach, yoga, bath, fitness and outdoor towels.<br>
                      - FAST DRYING / COMFORTABLE USE: This amazing towel is made by 100% microfiber, make 	it totally smooth and compact. A kind of luxurious touch and gentle on your skin. Soak up 	lots of sweat but dry fast, 10X faster than a standard towel, hold up more than 4X its weight in water.<br>
                      - TRAVEL& SPORTS TOWELS: The quick dry towel can be used for anything you can imagine: 	sports, hot yoga, running, gym. Our towels aren’t limited on sports or gym, also perfect for 	packing as your travel towel when you go on a trip, hiking, or camping.<br>
                      - EASY TO CLEAN & EASY TO CARRY: Machine Washable. Wash before the first use. Simply 	hand wash or machine wash (with like colors, cold) and air dry or tumble dry on low. The 	microfiber travel towel is equipped with a free bag and hanging snap loop so it is 	convenient packing and hanging for quick dry anywhere without blew away. Lightweight 	but big enough to dry yourself and easily put the towel in your gym bag or backpack.<br>
                      - BONUS: FREE breathable mesh travel bag along with a carabiner to attach or fit into your 	bag. Foldable design, easily be folded into a travel bag, store in your suitcase or backpack.<br>
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal3">
        <img src="images/isklar.jpg" alt="isklar">
        <h2>
          Nanofixit Isklar Norwegian Glacier Water 500 ml
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal3">Product Description</button>
        <!-- Modal -->
        <div id="myModal3" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Nanofixit Isklar Norwegian Glacier Water 500 ml</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/isklar.jpg" alt="alfamo">
                    <h3>Price : Php 60</h3>
                    
                    <!-- <form>
                      <div class="form-control">
                          <input type="number" name="itemNo" placeholder="Number of Item" required>
                      </div>
                      <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                    </form> -->
                    
                  </div>
                  <div class="col">
                    <p>
                      Isklar, The world’s cleanest water. From Hardanger. Norway. We collect artesian spring 	water from Folgefonna, a 6,000-year-old glacier. The water is tapped directly from the 	spring a few hundred metres below the glacier, on the border of Folgefonna National Park. 	The water is piped down the valley side of the Sørfjord, approximately 300 metres 	downwards, and up again on the other side directly into the Isklar bottling plant. There, the 	water is immediately bottled without having been exposed to the outside environment. 	The bottles were inspired by the glacier and come in clear and blue transparent bottles. 	Isklar has a documented low mineral content. We capture the pure, naturally filtered water 	from the glacier and let you drink it wherever you are. No other water conveys the flavour 	of the unspoilt Norwegian nature better!
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal4">
        <img src="images/wilkins.jpg" alt="isklar">
        <h2>
          Coca-Cola Wilkins Pure 500 ml
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal4">Product Description</button>
        <!-- Modal -->
        <div id="myModal4" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Coca-Cola Wilkins Pure 500 ml</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/wilkins.jpg" alt="alfamo">
                    <h3>Price : Php 20</h3>
                   
                    <!-- <form>
                      <div class="form-control">
                          <input type="number" name="itemNo" placeholder="Number of Item" required>
                      </div>
                      <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                    </form> -->
                    
                  </div>
                  <div class="col">
                    <p>
                      From your most trusted and internationally certified water brand comes Wilkins Pure. Every 	bottle is pure to the last drop, helping young adults stay healthy so they can be their best 	selves and live life to the fullest.
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
  
      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal5">
        <img src="images/redbull.jpg" alt="isklar">
        <h2>
          Red Bull Energy Drink 250 ml
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal5">Product Description</button>
        <!-- Modal -->
        <div id="myModal5" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Red Bull Energy Drink 250 ml</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/redbull.jpg" alt="alfamo">
                    <h3>Price : Php 100</h3>

                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                    
                  </div>
                  <div class="col">
                    <p>
                      Need an instant pick-me-upper that is as strong as you? Red Bull Energy Drink will 	vitalize your body and mind to keep you going for the long day ahead. It has the right mix of 	caffeine, taurine, B-group vitamins, and sugars to power you up instantly!<br>
                      Classic Red Bull flavor.<br>
                      Product of Austria.<br>
                      Stimulating caffeine for the body.<br>
                      Has taurine, an essential amino acid shown to reduce blood pressure and other biological processes.<br>
                      Contains B-group for maintaining normal body functions.<br>
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal6">
        <img src="images/vitacoco.jpg" alt="isklar">
        <h2>
          Vita Coco Coconut Water 330 ml
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal6">Product Description</button>
        <!-- Modal -->
        <div id="myModal6" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Vita Coco Coconut Water 330 ml</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/vitacoco.jpg" alt="alfamo">
                    <h3>Price : Php 45</h3>
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                  </div>
                  <div class="col">
                    <p>
                      Vita Coco Coconut Water 330ml, The original coconut water, never made from concentrate ! Filled with nutrients, electrolytes, and coconut goodness. Good for feeling good !
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal7">
        <img src="images/mikku.jpg" alt="isklar">
        <h2>
          Mikku Cultured Milk 300 ml
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal7">Product Description</button>
        <!-- Modal -->
        <div id="myModal7" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Mikku Cultured Milk 300 ml</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/mikku.jpg" alt="alfamo">
                    <h3>Price : Php 30</h3>
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                  </div>
                  <div class="col">
                    <p>
                      Upgrade your yogurt experience with Mikku! Get refreshed in 3 delicious flavors - original, 	orange, and blueberry! Contains 9 Amino acids, that helps brain cognitive, immune 	functions, neurotransmitter fractions, growth hormone enhancement, and normalize your 	sleep cycle.
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal8">
        <img src="images/yogurt.jpg" alt="isklar">
        <h2>
          Elle & Vire Mon Grec Greek Plain Yogurt 125g
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal8">Product Description</button>
        <!-- Modal -->
        <div id="myModal8" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Elle & Vire Mon Grec Greek Plain Yogurt 125g</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/yogurt.jpg" alt="alfamo">
                    <h3>Price : Php 75</h3>
                    
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->

                  </div>
                  <div class="col">
                    <p>
                      This unique recipe with fresh milk from Normandy has been revisited by Elle & Vire's cream experts, who added a unique touch of cream for a generous, fresh and mild taste 	beyond comparison. Smooth and creamy but also richer in protein, it is perfect as a snack.
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal9">
        <img src="images/cranberry.jpg" alt="isklar">
        <h2>
          North American Dried Cranberries 200g
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal9">Product Description</button>
        <!-- Modal -->
        <div id="myModal9" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">North American Dried Cranberries 200g</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/cranberry.jpg" alt="alfamo">
                    <h3>Price: Php 175</h3>
                    
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                    
                  </div>
                  <div class="col">
                    <p>
                      Product Description : <br>
                      Sweetened, dried cranberries from Ocean Spray Cranberries Inc., USA <br>
                      All natural, no preservatives, no artificial ingredients <br>
                      High in antioxidants and prebiotic fiber <br>
                      Great for fighting inflammation and UTI <br>
                      All natural, North American dried cranberries from Ocean Spray, the world’s biggest producer of cranberry products. A super healthy food that’s great for your snacks, baked goods, cereals, smoothies, and salads.
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

      <div id="isklar" class="p-md-3 separate cursor" data-toggle="modal" data-target="#myModal10">
        <img src="images/cashew.jpg" alt="isklar">
        <h2>
          Cashew Nuts - Raw and Ready to Eat 80g
        </h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal10">Product Description</button>
        <!-- Modal -->
        <div id="myModal10" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Cashew Nuts - Raw and Ready to Eat 80g</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modRow" class="d-flex justify-content-center row">
                  <div id="picForm" class="col pt-3">
                    <img src="images/cashew.jpg" alt="alfamo">
                    <h3>Price : Php 75</h3>
                    
                      <!-- <form>
                        <div class="form-control">
                            <input type="number" name="itemNo" placeholder="Number of Item" required>
                        </div>
                        <input type="submit" value="Buy" class="btn btn-primary fullbtn">
                      </form> -->
                    
                  </div>
                  <div class="col">
                    <p>
                      Cashews can help you feel fuller after a meal, which is beneficial for curbing food cravings, overeating and unhealthy snacking. Fats in general make food more satisfying and increase nutrient absorption of fat-soluble vitamins like vitamin A and vitamin D.
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
                    <li><a href="{{ route('mainpage-index') }}">Home</a></li>
                    <li><a href="{{ route('mainpage-location') }}">Location and Pricing</a></li>
                    <li><a href="{{ route('mainpage-classes') }}">Classes</a></li>
                    <li><a href="{{ route('mainpage-shop') }}">Shop</a></li>
                    <li><a href="{{ route('mainpage-about') }}">About Us</a></li>
                    <li><a href="{{ route('mainpage-sign-up') }}">Sign Up</a></li>
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
    