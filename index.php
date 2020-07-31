<?php
 include "connect.php";
 include "pages/includes/contact.php";
 include "pages/includes/phpcode.php";
 
// Login Session -
if(isset($_POST['submit'])){

  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  
  if(isset($name ) && isset($password)){
  
  $sql = "SELECT * FROM `login` WHERE `name`='{$name}'";
  $result = $db->query($sql);
  $array = $result->fetch_array();
    if($name == $array['name'] && $password == $array['password']){
          session_start();
          $_SESSION['nume'] =  $array['name'];
          $_SESSION['parola']  = $array['password'];
          header("Location:pages/dashboard.php");
    }
  }
}

# main page
$_main_page = '';
$_main_page_css = '';


$sql = "SELECT * FROM `hover_card` ORDER BY `id` DESC";
$result = $db->query($sql);
while($row = mysqli_fetch_array($result)) {

$_main_page_css .= '.a-'.$row['id'].'{ background:url(\'img/'.$row['card_background'].'\'); background-position:center; background-size:cover;
  width:320px; height:350px; }';

$_main_page .= 
  '<div class="container_showcase2">'.
        '<div class="box_showcase one a-'.$row['id'].'" >'.
          '<h2>'.$row['card_belt'].'</h2>'.
          '<div class="showcase_overlay">'.
          '<span>'.$row['card_title'].'</span>'. 
          '<p>'.$row['card_text'].'</p>'.
        '</div>'. '<a href="?delete='.$row['id'].'"></i>delete</a>'.
      '</div>'.
'</div>';
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="RainOnline webDesign" content="A simple webdesign">
  <meta name="Webdesign Rain RainOnline" content="HTML, CSS, JavaScript">
  <meta name="RainOnline" content="rain-online">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <meta property="og:title" content="Creative Rain">
      <meta property="og:image" content="img/MainPage.png">
      <meta property="og:description" content="This page is created by Rain -">
      <meta property="og:url" content="www.creativerain.ro">
      <meta name="twitter:card" content="summary_large_image">

  <title>RainOnline</title>


  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
  <script src="https://kit.fontawesome.com/e6d8468748.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Raleway:wght@300&display=swap" rel="stylesheet">
  <style><?= $_main_page_css ?></style>
  <script src="jquery.js"></script>
  <link rel="stylesheet" href="anotherindex.css">
</head>
<body>

      <!-- TESTARE -->
      <div class="content"  id="login-transition">
                <div class="loginbox">
                  <img src="img/avatar.png" class="avatar">
                  <div class="close_login" onclick="go_back()"><i class="fas fa-window-close"></i></div>

                <h2>Login Here</h2>

                <form action="" method="POST">
                  <p>Username</p>
                  <input type="text" name="name" placeholder="Enter Username" required>
                  <p>Password</p>
                  <input type="password" name="password" placeholder="Enter Password" required>
                  <input type="submit" name="submit" value="Login">
                  <a href="#">Lost your password?</a><br>
                </form>
              </div>
      </div>

  <!-- SCROLLER -->

  <div class="scroller hidescroller"><a href="#home">

     <h2><i class="fas fa-arrow-circle-up"></i></a></h2>

 </div>

    <!-- Sidebar Social Media -->

    <div class="sidebar-social-media">
        <li><a href="<?php echo $facebook; ?>"target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="<?php echo $instagram; ?>"target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li>
        <li><a href="<?php echo $twitter; ?>"target="_blank"><i class="fab fa-twitter"></i></a></li>
    </div>

    <!-- Logo  -->

     <div class="logo"> 
       <img src="img/<?php echo $logo ?>"  id="scrollingtop" alt="RainLogo.png">
    </div>
  
    <!-- CONTAINER -->
   <div class="container" id="home" 
        style="background-image:linear-gradient(to right bottom,#e4480056,#0e0d0cb7),
        url(img/<?php echo $image; ?>)">

    <!-- Burger Menu -->
    <label for="checkbox" id="burger" ><i class="fas fa-bars"></i></label>
    <input type="checkbox" id="checkbox">

       
      <!-- menu  -->

      <div class="menu" id="navbartop">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#blog">Address</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a class="active" onclick="loginwide()">Log In</a></li>
          </ul>
      </div>

      <!-- Showcase Text -->
      <div class="text-box">
        <h1 class="heading-primary">
          <span class="heading-primary-main"><?= $maintitle ?></span>
          <span class="heading-primary-sub"><?= $subtitle ?></span>
        </h1>
        <a href="#" class="btn btn-white">Tours</a>
      </div> 
</div>

    
     <!-- The Next Content Page -->
     <div class="content showcase">
       <div class="showcase1" >
         <div class="fade" data-aos="fade-right" data-aos-duration="1000">
          <?php echo "</p>".$abouttext."</p>" ; ?>
         </div>
       </div>
       <div class="showcase1right_image" >
          <div class="fade" data-aos="fade-left" data-aos-duration="1000">
           <img src="img/<?php echo $aboutphoto; ?>" alt="rainlogo.png">
          </div>
      </div>
    </div>

      <!-- Content 2 & 3-->

<div class="content showcase3" >
    <h5>Events</h5><br>
     <?= $_main_page; ?>
 </div>

      <!-- SHOWCASE 4 -->
  <div class="content showcase4" >
  <?php 
        echo '<div class="blog-2" data-aos="fade-up"
        data-aos-duration="700">'
                .'<h2>'.$title .'</h2>';
                  echo '<p>'.htmlspecialchars_decode($text).'</p>';
                  echo '<div id="date">'.'Last edited at -  '.$date.'</div>';
        echo '</div>';
      ?>
  </div>
       <!-- CONTENT 5  -->
     
        
        <!--  SHOW CASE 7 FLIP CARDS -->
        <div class="content showcase7" >
           
          <div class="poznace" data-aos="fade-up"
        data-aos-duration="700">
            <h2>Hover over Images</h2>
            <div class="card middle">
              <div class="front">
                <img src="img/5.jpg" alt="rainlogo.png">
              </div>
              <div class="back">
                <div class="back-content middle">
                  <h2>Rain-Online</h2>
                  <span>Webdesign</span>
                  <div class="sm">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card middle">
              <div class="front">
                <img src="img/1.jpg" alt="rainlogo.png">
              </div>
              <div class="back">
                <div class="back-content middle">
                  <h2>Rain-Online</h2>
                  <span>Webdesign</span>
                  <div class="sm">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card middle">
              <div class="front">
                <img src="img/3.jpg" alt="rainlogo.png">
              </div>
              <div class="back">
                <div class="back-content middle">
                  <h2>Rain-Online</h2>
                  <span>Webdesign</span>
                  <div class="sm">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card middle">
              <div class="front">
                <img src="img/4.jpg" alt="rainlogo.png">
              </div>
              <div class="back">
                <div class="back-content middle">
                  <h2>Rain-Online</h2>
                  <span>Webdesign</span>
                  <div class="sm">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
          
   </div>
        <!-- CONTENT 6  (CONTACT PAGE) -->

        <div class="content showcase6">
            <div class="contact_left">
              <div class="contact_left_text" data-aos="fade-right"
        data-aos-duration="700">
                <i class="fas fa-map-marker-alt"><p>Address</p></i>
                <ul>
                  <li><?= $address;?></li>
                </ul>
                <i class="fas fa-phone-alt"><p>Let's Talk</p></i>
                <ul>
                  <li><?= $phone_number;?></li>
                </ul>
                <i class="fas fa-envelope"><p>Support</p></i>
                <ul>
                  <li><?= $email;?></li>
                </ul>
              </div>
            </div>

              <div class="contact_right" >
                <div class="contact_right_text" data-aos="fade-left"
        data-aos-duration="700"> 
                  <form action="" method="POST">
                      <h2><i class="fas fa-envelope-open-text"></i>Contact Us</h2>
                      <h3>Tell Us Your Name</h3>

                      <input type="text" name="firstname" placeholder="First Name" required>
                      <input type="text" name="lastname" placeholder="Last Name" required>

                      <h3>Enter Your Email</h3>

                      <input type="email" name="email" placeholder="Eg.example@hotmail.com" required><br>

                      <h3>Enter Phone Number</h3>

                      <input type="text"  name="phone" placeholder="Eg.+1 800 9800 900" required>

                      <h3>Message</h3>

                      <textarea name="message" placeholder="Write us a message" ></textarea><br>
                      <input type="submit" id="contact_button" name="submited" value="submit">
                  </form>
                </div>
            </div>
        </div>
         
    <!-- FOOTER  -->
<div class="footer" >
  <!-- Footer boxes -->
  <div class="box box1 " class="blog-2" >
    <h2><span id="rain">Creative </span>Rain</h2>
    <?php echo $footer_text;?><br>
    <i class="fas fa-phone-square-alt"></i> <?php echo $phone_number;?><br>
    <i class="fas fa-envelope"></i> <?php echo $email;?><br>
     <div class="social">
      <a href="<?php echo $facebook; ?>"target="_blank" ><i class="fab fa-facebook-square"></i></a>
      <a href="<?php echo $instagram; ?>"target="_blank" ><i class="fab fa-instagram-square"></i></a>
      <a href="<?php echo $youtube; ?>"target="_blank" ><i class="fab fa-youtube-square"></i></a>
      <a href="<?php echo $twitter; ?>"target="_blank" ><i class="fab fa-twitter-square"></i></a>
     </div>
  </div>

  <div class="box box2" >
   
    <h2>Other Pages</h2>
      <li>Events & Organizers</li>
      <li>Users</li>
      <li>Services</li>
      <li>Galleries & Images</li>
      <li>Write to us</li>
      <li><a href="terms_and_cond.php">Terms and Conditions</a></li>

  </div>

  <div class="box box_input box3" >
    <h2>Newsletter</h2>
    <input type="text" id="width" placeholder="Your email address"><br>
    <textarea name="" id="width" cols="5" rows="2" placeholder="Message.."></textarea><br>
    <button><i class="fas fa-paper-plane"></i> send</button>
  </div>
  
  <!-- Bottom footer -->
  <div class="bottom-footer" id="contact" >
   <p> copyright &copy; rain-online</p>
  </div>
  
</div>

<script>
  AOS.init();
</script>

</body>
</html>