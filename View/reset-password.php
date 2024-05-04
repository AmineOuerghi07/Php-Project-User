<?php

include "../Controller/ClientC.php";

$error="";
$expire = 0;

session_start();



if((isset($_SESSION['idClient']) && (isset($_SESSION['nom'])) && (isset($_SESSION['prenom']))))
{
  header("location: info.php");
}

if(isset($_GET['idClient']))
{
    $clientC = new ClientC();

    $reset = $clientC->getResetById($_GET['idClient']);
    if(!$reset)
    {
        $error = "You can't access this page <a href='login.php'>click here</a> please";
    }
    else
    {
        if(date('Y-m-d H:i:s',time()) > $reset['expire'])
        {
            $expire = 1;
            $error = "You can't access this page <a href='login.php'>click here</a> please";
            $clientC->deleteReset($reset['idReset']);   
        }
    }

}

if(isset($_POST['password']) && isset($_POST['cpassword']))
{
    if(!empty($_POST['password']) && !empty($_POST['cpassword']))
    {
        $clientC->updateClientPassword($_GET['idClient'],md5($_POST['password']));
        $clientC->deleteReset($reset['idReset']);   
        header("location: login.php");
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Default Description">
<meta name="keywords" content="fashion, store, E-commerce">
<meta name="robots" content="*">
<link rel="icon" href="#" type="image/x-icon">
<link rel="shortcut icon" href="#" type="image/x-icon">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="stylesheet/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="stylesheet/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="stylesheet/revslider.css" >
<link rel="stylesheet" type="text/css" href="stylesheet/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="stylesheet/owl.theme.css">
<link rel="stylesheet" type="text/css" href="stylesheet/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="stylesheet/jquery.mobile-menu.css">
<link rel="stylesheet" type="text/css" href="stylesheet/style.css" media="all">
<link rel="stylesheet" type="text/css" href="stylesheet/responsive.css" media="all">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Saira+Condensed:300,400,500,600,700,800" rel="stylesheet">
</head>
<body>
    <?php 
        if(isset($_GET['idClient']) && $reset && !$expire)
        {

    ?>
<div id="page">
<header>
    <div class="container">
      <div class="row">
        <div id="header">
          <div class="header-container">
            <div class="header-logo"> <a href="home.php" title="Car HTML" class="logo">
              <div><img src="images/logo.png" alt="Car Store"></div>
              </a> </div>
            <div class="header__nav">
              <div class="header-banner">
                <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                  <div class="assetBlock">
                    <div style="height: 20px; overflow: hidden;" id="slideshow">
                      <p style="display: block;">Hot days! - <span>50%</span> Get ready for summer! </p>
                      <p style="display: none;">Save up to <span>40%</span> Hurry limited offer!</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i class="fa fa-clock-o"></i> Mon - Fri : 09am to 06pm <i class="fa fa-phone"></i> +1 800 789 0000</div>
              </div>
              <div class="fl-header-right">
                <div class="fl-links">
                  <div class="no-js"> <a title="" class="clicker"></a>
                    <div class="fl-nav-links">
                      <div class="language-currency">
                        <div class="fl-language">
                        <h3>Language</h3>
                          <ul class="lang">
                            <li><a href="#"> <img src="images/english.png" alt="English"> <span>English</span> </a></li>
                            <li><a href="#"> <img src="images/francais.png" alt="French"> <span>French</span> </a></li>
                            <li><a href="#"> <img src="images/german.png" alt="German"> <span>German</span> </a></li>
                          </ul>
                        </div>
                        <!--fl-language--> 
                        <!-- END For version 1,2,3,4,6 --> 
                        <!-- For version 1,2,3,4,6 -->
                        <div class="fl-currency">
                         <h3>Currency</h3>
                          <ul class="currencies_list">
                            <li><a href="#" title="EGP"> <strong>£</strong> Pound Sterling</a></li>
                            <li><a href="#" title="EUR"> <strong>€</strong> Euro</a></li>
                            <li><a href="#" title="USD"> <strong>$</strong> US Dollar</a></li>
                          </ul>
                        </div>
                        <!--fl-currency--> 
                        <!-- END For version 1,2,3,4,6 --> 
                      </div>
                       <h3>My Acount</h3>
                      <ul class="links">
                      <?php 
                      if((isset($_SESSION['idClient']) && (isset($_SESSION['nom'])) && (isset($_SESSION['prenom']))))
                      { ?>
                        <li><?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></a></li>
                        <li><a href="info.php" title="Modify">Modify Account</a></li>
                        <li><a href="logout.php" title="Modify">Logout</a></li>
                        <?php }
                        else
                        {?>
                        <li><a href="login.php" title="My Account">Login</a></li>
                        <li><a href="register.php" title="Wishlist">Register</a></li>
                        <?php } ?>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="fl-cart-contain">
                  <div class="mini-cart">
                    <div class="basket"> <a href="shopping-cart.php"><span> 2 </span></a> </div>
                   
                    <!--fl-mini-cart-content--> 
                  </div>
                </div>
                <!--mini-cart-->
               
                <!--links--> 
              </div>
              <div class="fl-nav-menu">
                <nav>
                  <div class="mm-toggle-wrap">
                    <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span> </div>
                  </div>
                  <div class="nav-inner"> 
                    <!-- BEGIN NAV -->
                    <ul id="nav" class="hidden-xs">
                      <li class="active"> <a class="level-top" href="home.php"><span>Home</span></a></li>
                      <li> <a class="level-top" href="grid1.php"><span>Accessories</span></a>
                        
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="#"><span>Listing</span></a>
                        <ul class="level1">
                          
                          <li class="level1 nav-10-2"> <a href="list.php"> <span>Car List</span> </a> </li>
                          <li class="level1 nav-10-4"> <a href="grid1.php"> <span>Accessories List</span> </a> </li>
          
                        </ul>
                      </li>
                      
                      <li class="mega-menu hidden-sm"> <a class="level-top" href="listReclamationC.php"><span>Réclamation</span></a> </li>
                      <li class="level0 parent drop-menu"><a href="#"><span>Checking Out</span> </a> 
                        <!--sub sub category-->
                        <ul class="level1">
                          <li class="level1 nav-10-4"> <a href="shopping-cart.php"> <span>Cart Page</span> </a> </li>
                          <li class="level1 first parent"><a href="checkout.php"><span>Checkout</span></a> 
                            <!--sub sub category-->
                            
                            <!--sub sub category--> 
                          </li>
                        
      
          
                        </ul>
                      </li>
                      
                      <li> <a href="#" class="level-top"> <span>Custom</span> </a> </li>
                      <li> <a class="level-top" href="mailto:tgear2023@gmail.com"> <span>Contact Us</span> </a> </li>
                      
                    </ul>
                    <!--nav--> 
                  </div>
                </nav>
              </div>
            </div>
            
            <!--row--> 
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
     <div class="page-title">
     <h2>Login to your account</h2>
  </div>
        </div>
        <!--col-xs-12-->
      </div>
      <!--row-->
    </div>
    <!--container-->
  </div>
    
       
<!-- BEGIN Main Container -->  
          
       <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">     
              
	       <div class="main">                     
                            <div class="account-login container">
  <!--page-title-->

       <form name="f" method="POST" action="">
       <div class="content">
                    
                    <p>Enter your new password here:</p>
                    <ul class="form-list">
                    <li>
                             <label for="password">New Password:<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="password" name="password" value="" id="password" class="input-text required-entry validate-email" title="Password">
                            </div>
                        </li>
                        <li>
                             <label for="password">Confirm Password:<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="password" name="cpassword" value="" id="password" class="input-text required-entry validate-email" title="Password">
                            </div>
                        </li>                        
                                                                    </ul>

                                                                    <div class="buttons-set">
                  
                  <button type="submit" class="button" title="Login" name="send" id="send2"><span>Confirm</span></button>

               </div>
</div>
       </form>


   
</div> <!--account-login-->
         
	       </div><!--main-container-->
          
          </div> <!--col1-layout-->
          

  
 
   
  <!-- For version 1,2,3,4,6 -->
  
   <footer> 
    <!-- BEGIN INFORMATIVE FOOTER -->
    <div class="footer-inner">
      <div class="our-features-box wow bounceInUp animated animated">
        <div class="container">
          <ul>
            <li>
              <div class="feature-box">
                <div class="icon-truck"><img src="images/world-icon.png" alt="Image"></div>
                <div class="content">
                  <h6>World's #1</h6>
                  <p>Largest Auto portal</p>
                </div>
              </div>
            </li>
            <li>
              <div class="feature-box">
                <div class="icon-support"><img src="images/car-sold-icon.png" alt="Image"></div>
                <div class="content">
                  <h6>Car Sold</h6>
                  <p>Every 4 minute</p>
                </div>
              </div>
            </li>
            <li>
              <div class="feature-box">
                <div class="icon-money"><img src="images/tag-icon.png" alt="Image"></div>
                <div class="content">
                  <h6>Offers</h6>
                  <p>Stay updated pay less</p>
                </div>
              </div>
            </li>
            <li class="last">
              <div class="feature-box">
                <div class="icon-return"><img src="images/compare-icon.png" alt="Image"></div>
                <div class="content">
                  <h6>Compare</h6>
                  <p>Decode the right car</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="newsletter-row">
        <div class="container">
          <div class="row"> 
            
            <!-- Footer Newsletter -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
              <div class="newsletter-wrap">
                <h5>Newsletter</h5>
                <h4>Get Notified Of any Updates!</h4>
                <form action="#" method="post" id="newsletter-validate-detail1">
                  <div id="container_form_news">
                    <div id="container_form_news2">
                      <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Enter your email address">
                      <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>
                    </div>
                    <!--container_form_news2--> 
                  </div>
                  <!--container_form_news-->
                </form>
              </div>
              <!--newsletter-wrap--> 
            </div>
          </div>
        </div>
        <!--footer-column-last--> 
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-xs-12 col-lg-4">
            <div class="co-info">
              <h4>SHOWROOM</h4>
              <address>
              <div><span>ThemesGround, 789 Main rd, Anytown, <br>
                CA 12345 USA</span></div>
              <div> <span> +1 800 789 0000</span></div>
              <div> <span><a href="#">Harrier@themesground.com</a></span></div>
              <div> <span>Mon - Fri : 09am to 06pm</span></div>
              </address>
            </div>
          </div>
          <div class="col-sm-8 col-xs-12 col-lg-8">
            <div class="footer-column">
              <h4>Quick Links</h4>
              <ul class="links">
                <li class="first"><a title="How to buy" href="http://themesground.com/blog/">Blog</a></li>
                <li><a title="FAQs" href="#">FAQs</a></li>
                <li><a title="Payment" href="#">Payment</a></li>
                <li><a title="Shipment" href="#">Shipment</a></li>
                <li><a title="Where is my order?" href="#">Where is my order?</a></li>
                <li class="last"><a title="Return policy" href="#">Return policy</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Style Advisor</h4>
              <ul class="links">
                <li class="first"><a title="Your Account" href="#">Your Account</a></li>
                <li><a title="Information" href="#">Information</a></li>
                <li><a title="Addresses" href="#">Addresses</a></li>
                <li><a title="Addresses" href="#">Discount</a></li>
                <li><a title="Orders History" href="#">Orders History</a></li>
                <li class="last"><a title=" Additional Information" href="#"> Additional Information</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4>Information</h4>
              <ul class="links">
                <li class="first"><a title="Site Map" href="#">Site Map</a></li>
                <li><a title="Search Terms" href="#">Search Terms</a></li>
                <li><a title="Advanced Search" href="#">Advanced Search</a></li>
                <li><a title="History" href="#">About Us</a></li>
                <li><a title="History" href="#">Contact Us</a></li>
                <li><a title="Suppliers" href="#">Suppliers</a></li>
              </ul>
            </div>
          </div>
          
          <!--col-sm-12 col-xs-12 col-lg-8--> 
          <!--col-xs-12 col-lg-4--> 
        </div>
        <!--row--> 
        
      </div>
      
      <!--container--> 
    </div>
    <!--footer-inner-->
    
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="social">
              <ul>
                <li class="fb"><a href="#"></a></li>
                <li class="tw"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="rss"><a href="#"></a></li>
                <li class="pintrest"><a href="#"></a></li>
                <li class="linkedin"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 coppyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
          <div class="col-xs-12 col-sm-4">
            <div class="payment-accept"> <img src="images/payment-1.png" alt=""> <img src="images/payment-2.png" alt=""> <img src="images/payment-3.png" alt=""> <img src="images/payment-4.png" alt=""> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BEGIN SIMPLE FOOTER --> 
  </footer>
  <!-- End For version 1,2,3,4,6 -->
  
</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
  <ul>
        <li>
      <div class="mm-search">
        <form id="search1" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
          </div>
        </form>
      </div>
    </li>
     <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>
    <li><a href="grid1.html">Accessories</a>
      <!--mega menu-->
                                <ul class="level0">
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Audio</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Amplifiers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Installation Parts</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Speakers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Stereos</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Subwoofers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Body Parts</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bumpers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Doors</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fenders</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Grilles</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Hoods</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Exterior</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bed Accessories</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Body Kits</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Grilles</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Car Covers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Bumpers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Interior</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Gauges</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Dash Kits</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Seat Covers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Steering Wheels</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Sun Shades</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Lighting</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fog Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Headlights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>LED Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Signal Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Performance</span></a> 
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Air Intake Systems</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Brakes</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Exhaust Systems</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Power Adders</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Racing Gear</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1--> 
                                    <!--sub sub category--> 
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                </ul>
                                <!--level0--> 
    </li>
    <li><a href="#">Listing‎</a>
      <ul class="level1">
        <li class="level1 first"><a href="grid.html"><span>Car Grid</span></a></li>
        <li class="level1 nav-10-2"> <a href="list.html"> <span>Car List</span> </a> </li>
        <li class="level1 nav-10-3"> <a href="grid1.html"> <span>Accessories Grid</span> </a> </li>
        <li class="level1 nav-10-4"> <a href="list1.html"> <span>Accessories List</span> </a> </li>
        <li class="level1 first parent"><a href="car-detail.html"><span>Car Detail</span></a> </li>
        <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories Detail</span></a> </li>
      </ul>
    </li>
    <li><a href="grid.html">Blog</a>
       <ul class="level1">
          <li class="level1 first"><a href="blog.html"><span>Blog List</span></a></li>
          <li class="level1 nav-10-2"> <a href="blog-detail.html"> <span>Blog Detail</span> </a> </li>
        </ul>
    </li>
    <li><a href="compare.html">Sandwiches‎</a></li>
    <li><a href="#">Pages</a>
       <ul class="level1">
                          <li class="level1"> <a href="about-us.html"> <span>About us</span> </a> </li>
                          <li class="level1 nav-10-4"> <a href="shopping-cart.html"> <span>Cart Page</span> </a> </li>
                          <li class="level1 first parent"><a href="checkout.html"><span>Checkout</span></a> 
                            <!--sub sub category-->
                            <ul class="level2 right-sub">
                              <li class="level2 nav-2-1-1 first"><a href="checkout-method.html"><span>Method</span></a></li>
                              <li class="level2 nav-2-1-5 last"><a href="checkout-billing-info.html"><span>Billing Info</span></a></li>
                            </ul>
                            <!--sub sub category--> 
                          </li>
                          <li class="level1 nav-10-4"> <a href="wishlist.html"> <span>Wishlist</span> </a> </li>
                          <li class="level1"> <a href="dashboard.html"> <span>Dashboard</span> </a> </li>
                          <li class="level1"> <a href="multiple-addresses.html"> <span>Multiple Addresses</span> </a> </li>
                          <li class="level1"><a href="contact-us.html"><span>Contact us</span></a> </li>
                          <li class="level1"><a href="404error.html"><span>404 Error Page</span></a> </li>
                          <li class="level1"><a href="login.html"><span>Login Page</span></a> </li>
                          <li class="level1"><a href="quickview.html"><span>Quick View</span></a> </li>
                          <li class="level1"><a href="newsletter.html"><span>Newsletter</span></a> </li>
                        </ul>
    </li>
    <li><a href="#">Custom</a></li>
   </ul>
</div>
<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/parallax.js"></script> 
<script type="text/javascript" src="js/revslider.js"></script> 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>

<?php 
        }
        else
        {
            $error = "You can't access this page <a href='login.php'>click here</a> please";
            echo $error;
        }

?>
</body>



</html>