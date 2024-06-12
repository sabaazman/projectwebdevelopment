<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Untree.co" />
  <link rel="shortcut icon" href="adven_icon.png" />

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap5" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="fonts/icomoon/style.css" />
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

  <link rel="stylesheet" href="css/tiny-slider.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/style.css" />

  <title>KEMBARA CLUB UTHM</title>
</head>
<body>
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
      <div class="menu-bg-wrap">
        <div class="site-navigation">
          <a href="about.html"><img src="images/kembara.jpg" alt="Image" width="50" height="50"></a>
          <a href="https://www.uthm.edu.my/en/" target="_blank"><img src="images/uthm2.jpg" alt="Image" width="175" height="50"></a>
          <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
            <li><a href="about.html">About</a></li>
            <li class="has-children">
              <a href="#">News and Events</a>
              <ul class="dropdown">
                <li><a href="#">News</a></li>
                <li><a href="pastevent.html">Past Event</a></li>
                <li><a href="upcomingevent.html">Upcoming Event</a></li>
              </ul>
            </li>
            <li><a href="registration.html">Registration</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.php">Log In</a></li>
          </ul>
          <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="hero page-inner overlay" style="background-image: url('images/backgroudkk.png')">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center mt-5">
          <h1 class="heading" data-aos="fade-up">News</h1>
        </div>
      </div>
    </div>
  </div>
  <br>
  
  <div class="section">
    <div class="container property-slider-container">
      <div class="row mb-5 align-items-center">
        <div class="col-lg-6 text-center mx-auto"></div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="property-slider-wrap">
            <div class="property-slider">
            <?php
                include "conn.php";
                $sql = "SELECT * FROM event";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { // Check if there are any results
                  while($row = $result->fetch_assoc()) {
                    echo '<div class="property-item">';
                    echo "<img src='" . $row['eventPic'] . "' alt='Event Pic' class='img-fluid mx-auto d-block'>";
                    echo '  <div class="property-content">';
                    echo '      <div class="price mb-2"><span>' . $row['eventName'] . '</span></div>';
                    echo '      <div>';
                    echo '          <span class="d-block mb-2 text-black-50">' . $row['eventDate'] . '</span>';
                    echo '          <span class="city d-block mb-3">' . $row['eventDetail'] . '</span>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                  }
                } else {
                  echo '<p>No events found.</p>'; // Display a message if no results are found
                }
                $conn->close(); // Close the database connection
                ?>

            </div>
            <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
              <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
              <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
    
    <div class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="widget">
                <h3>MAIN CAMPUS</h3>
                <address>Universiti Tun Hussein Onn Malaysia (UTHM),
                  86400 Parit Raja, Batu Pahat , Johor, Malaysia</address>
                  <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x31d05eaa459d0ab9:0x495f817bef16f0a1?source=g.page.share" target="_blank">Maps Direction</a>
                <!-- <ul class="list-unstyled links">
                  <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                  <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                  <li>
                    <a href="mailto:info@mydomain.com">info@mydomain.com</a>
                  </li>
                </ul> -->
              </div>
              <!-- /.widget -->
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <div class="widget">
                <h3>Sources</h3>
                <ul class="list-unstyled float-start links">
                  <li><a href="https://hep.uthm.edu.my/ms/bahagian/bahagian-kepimpinan-dan-sahsiah-pelajar-bksp?view=article&id=217&catid=44" target="_blank">Club List</a></li>
                  <!-- <li><a href="#">Services</a></li> -->
                  <!-- <li><a href="#">Vision</a></li>
                  <li><a href="#">Mission</a></li>
                  <li><a href="#">Terms</a></li>
                  <li><a href="#">Privacy</a></li> -->
                </ul>
                <ul class="list-unstyled float-start links">
                  <!-- <li><a href="#">Partners</a></li> -->
                  <!-- <li><a href="#">Business</a></li> -->
                  <!-- <li><a href="#">Careers</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Creative</a></li> -->
                </ul>
              </div>
              <!-- /.widget -->
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <div class="widget">
                <h3>Links</h3>
                <!-- <ul class="list-unstyled links">
                  <li><a href="#">Our Vision</a></li>
                  <li><a href="#">About us</a></li>
                  <li><a href="#">Contact us</a></li>
                </ul> -->
  
                <ul class="list-unstyled social">
                  <li>
                    <a href="https://www.instagram.com/kembarauthm/" target="_blank"><span class="icon-instagram"></span></a>
                  </li>
                  <li>
                    <a href="http://www.youtube.com/@kelabkembarauthm6277" target="_blank"><span class="icon-youtube"></span></a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/kelabkembarauthm" target="_blank"><span class="icon-facebook"></span></a>
                  </li>
                  <!-- <li>
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li>
                    <a href="#"><span class="icon-pinterest"></span></a>
                  </li>
                  <li>
                    <a href="#"><span class="icon-dribbble"></span></a>
                  </li> -->
                </ul>
                <ul class="list-unstyled links">
                  <li><a href="tel://195308913">+60 19-530 8913</a></li>
                <!-- <li><a href="tel://11234567890">+1(123)-456-7890</a></li> -->
                <li>
                    <a href="mailto:kkuthm@gmail.com">kkuthm@gmail.com</a>
                  </li>
                </ul>
              </div>
              <!-- /.widget -->
            </div>
            <!-- /.col-lg-4 -->
          </div>
          <!-- /.row -->
  
          <div class="row mt-5">
            <div class="col-12 text-center">
              <!-- 
                **==========
                NOTE: 
                Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
                **==========
              -->
  
              <p>
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                . All Rights Reserved. &mdash; Designed with love by Group 5
                <!-- <a href="https://untree.co">Untree.co</a> -->
                <!-- License information: https://untree.co/license/ -->
              </p>
              <!-- <div>
                Distributed by
                <a href="https://themewagon.com/" target="_blank">themewagon</a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /.container -->
      </div>
      <!-- /.site-footer -->
  
      <!-- Preloader -->
      <div id="overlayer"></div>
      <div class="loader">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
  
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/tiny-slider.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/navbar.js"></script>
      <script src="js/counter.js"></script>
      <script src="js/custom.js"></script>
  </body>
</html>
