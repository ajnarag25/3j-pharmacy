<?php
  include('db_conn.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/Analytics.css" />
    <link rel="stylesheet" href="css/crud.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Accounts | 3J's Pharmacy</title>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase.js"></script>
    <style>
      canvas {
        max-width: 700px;
        height: 500px;
        margin: 0 auto;
        display: block;
      }
    </style>
    <!-- <script src="/src/firebase.js"></script> -->
  </head>
  <body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <h3 style="text-align: center; margin: 0 auto; display: table; margin-top: 30px;">3J's Pharmacy</h3>
      <ul class="side-menu top">
        <li>
          <a href="dashboard.php">
            <i class="bx bx-user-pin"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="users.php">
            <i class="bx bxs-user-account"></i>
            <span class="text">Accounts</span>
          </a>
        </li>
       <li class="active">
				<a href="about.php">
					<i class='bx bxs-group' ></i>
					<span class="text">About Us</span>
				</a>
			</li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="logout.php" class="logout" id="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- SIDEBAR -->

    <section id="content">
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">

          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
      </nav>

      <main>
        <!-- About section -->
        <h1 style="text-align: center;">About Us</h1>
        <p style="text-align: center;">
          3J's Pharmacy is a family-owned business that has been serving the
          local community for over 30 years. Our mission is to provide the
          highest quality pharmaceutical care to our customers. We take pride
          in our knowledgeable staff and our commitment to customer service.
        </p>
<br/>
<!-- Visit Us -->
<!-- DEVELOPERS SECTION -->
<section id="visit">
  <div class="container">
    <h2 style="text-align: center;">Visit us at</h2>
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <div class="address">
          <p style="text-align: center;">B147 L1 PH7 Carissa Homes Punta 1 Tanza, Cavite  </p>
        </div>
      </div>
      
      <div class="col-md-6 col-lg-6">
        <div class="contact">
          <h4 style="text-align: center;">Or directly message us;</h4><p style="text-align: center;">09217351464</p>
        </div>
      </div>
    </div>
  </div>
</section>

      <h2 class="text-center">Frequently Asked Questions</h2>
      <!-- FAQ Section -->
      <section id="faq">
        <div class="container" style="color:black">
          <div class="accordion">
            <div class="accordion-item">
              <div class="accordion-item-header">
                <span class="icon">&#9654;</span> <b>How to send my prescription medication?</b>
              </div>
              <div class="accordion-item-body">
                - To send your prescription medication, you can either upload a scanned copy of your prescription through our app or website, or you can have your doctor directly send the prescription to us. Once we receive your prescription, we will process it and prepare your medication for delivery or pickup. If you have any questions or concerns about the prescription submission process, please don't hesitate to contact our customer support team.                </div>
            </div>
            <br/>
            <div class="accordion-item">
              <div class="accordion-item-header">
                <span class="icon">&#9654;</span> <b>How to Order?</b>
              </div>
              <div class="accordion-item-body">
                To order medication from 3J's Pharmacy, you can follow these steps:
                <ol>
                  <li>1.) Download and install our mobile app on your smartphone or tablet.</li>
                  <li>2.) Sign up for an account and create a profile.</li>
                  <li>3.) Browse our medication catalogue to find the items you need.</li>
                  <li>4.) Add your desired medications to your cart.</li>
                  <li>5.) Review your cart and make sure everything is correct.</li>
                  <li>6.) Proceed to checkout and select your preferred payment method.</li>
                  <li>7.) Review your order one more time and confirm your purchase.</li>
                  <li>8.) Wait for your order to be processed and delivered to your doorstep.</li>
                </ol>
              </div>
            </div>
           <br/>
            <div class="accordion-item">
              <div class="accordion-item-header">
                <span class="icon">&#9654;</span> <b>How can I avail Senior/PWD Citizen Discount?</b>
                
              </div>
              <div class="accordion-item-body">
                 To avail Senior/PWD Citizen Discount, you need to provide a valid government-issued ID as proof of eligibility upon checkout or registration of your account. The discount will be automatically applied to your total bill. Please note that the discount is only applicable to prescription medication and not to over-the-counter items.
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- DEVELOPERS SECTION -->
      <section id="developers">
        <div class="container">
          <h2>Meet Our Developers</h2><br/>
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="developer">
                <img src="https://freepngimg.com/download/anime/10-2-anime-png-images.png" alt="developer1" width="50px" height="50px">
                <h3>Eden</h3>
                <p>Front-end Developer</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="developer">
                <img src="https://freepngimg.com/download/anime/10-2-anime-png-images.png" alt="developer2" width="50px" height="50px">
                <h3>Gracia</h3>
                <p>Front-End Developer</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <div id="chartContainer" style="height: 400px; width: 100%"></div>


    <script src="js/script.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>

 
  </body>
</html>
