<?php

session_start();

include "../Controller/ClientC.php";

if((isset($_SESSION['idClient']) && (isset($_SESSION['nom'])) && (isset($_SESSION['prenom']))))
{
  header("location: info.php");
}

$error = "";

$clientC = new ClientC();


if((isset($_POST["lname"]))
    && (isset($_POST["fname"]))
    && (isset($_POST["ad"]))
    && (isset($_POST["tel"]))
    && (isset($_POST["pass"]))
    && (isset($_POST["cpass"]))
    && (isset($_POST["email"])))
    {
      if((!empty($_POST["lname"]))
      && (!empty($_POST["fname"]))
      && (!empty($_POST["ad"]))
      && (!empty($_POST["tel"]))
      && (!empty($_POST["pass"]))
      && (!empty($_POST["cpass"]))
      && (!empty($_POST["email"])))
      {
        $result = $clientC->getClientByEmail($_POST["email"]);
        if($result)
        {
          $error = "<strong>This email is already registered please <a href='login.php'>click here</a> in order to login</strong><br />";
        }
        else
        {
            $client = new Client($_POST["lname"],$_POST["fname"],$_POST["tel"],$_POST["ad"],md5($_POST["pass"]),$_POST["email"]);
            $clientC->addClient($client);
            $result = $clientC->getClientByEmail($_POST["email"]);
            $clientC->sendEmail($_POST['email'],"Account Confirmation","In order to confirm your account click the link below<br /><a href='http://127.0.0.1/PhpProject/Front%20End/View/confirm-account.php?idClient=".$result['idClient']."'>Confirm Account</a><br /><br />Have a nice day !");
            header("location: login.php");
        }

      }
      else
      {
        $error = "Please fill all the fields !!";
      }
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registration</title>
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
<div id="page">
  <header>
    <div class="container">
      <div class="row">
        <div id="header">
          <div class="header-container">
            <div class="header-logo"> <a href="index-2.html" title="Car HTML" class="logo">
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
                        <li><a href="login.html" title="My Account">Login</a></li>
                        <li><a href="login.html" title="Wishlist">Register</a></li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="fl-cart-contain">
                  <div class="mini-cart">
                    <div class="basket"> <a href="shopping-cart.html"><span> 2 </span></a> </div>
                    <div class="fl-mini-cart-content" style="display: none;">
                      <div class="block-subtitle">
                        <div class="top-subtotal">2 items, <span class="price">$259.99</span> </div>
                        <!--top-subtotal--> 
                        <!--pull-right--> 
                      </div>
                      <!--block-subtitle-->
                      <ul class="mini-products-list" id="cart-sidebar">
                        <li class="item first">
                          <div class="item-inner"><a class="product-image" title="timi &amp; leslie Sophia Diaper Bag, Lemon Yellow/Shadow White" href="#l"><img alt="timi &amp; leslie Sophia Diaper Bag, Lemon Yellow/Shadow White" src="products-images/p4.jpg"></a>
                            <div class="product-details">
                              <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                              <!--access--> 
                              <strong>1</strong> x <span class="price">$179.99</span>
                              <p class="product-name"><a href="accessories-detail.html">timi &amp; leslie Sophia Diaper Bag...</a></p>
                            </div>
                          </div>
                        </li>
                        <li class="item last">
                          <div class="item-inner"><a class="product-image" title="JP Lizzy Satchel Designer Diaper Bag - Slate Citron" href="#"><img alt="JP Lizzy Satchel Designer Diaper Bag - Slate Citron" src="products-images/p3.jpg"></a>
                            <div class="product-details">
                              <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                              <!--access--> 
                              <strong>1</strong> x <span class="price">$80.00</span>
                              <p class="product-name"><a href="accessories-detail.html">JP Lizzy Satchel Designer Diaper Ba...</a></p>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <div class="actions">
                        <button class="btn-checkout" title="Checkout" type="button" onClick="window.location=checkout.html"><span>Checkout</span></button>
                      </div>
                      <!--actions--> 
                    </div>
                    <!--fl-mini-cart-content--> 
                  </div>
                </div>
                <!--mini-cart-->
                <div class="collapse navbar-collapse">
                  <form class="navbar-form" role="search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">
                      <button type="submit" class="search-btn"> <span class="glyphicon glyphicon-search"> <span class="sr-only">Search</span> </span> </button>
                      </span> </div>
                  </form>
                </div>
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
                      <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>
                      <li class="mega-menu"> <a class="level-top" href="grid1.html"><span>Accessories</span></a>
                        <div class="level0-wrapper dropdown-6col" style="left: 0px; display: none;">
                          <div class="container">
                            <div class="level0-wrapper2">
                              <div class="nav-block nav-block-center"> 
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
                              </div>
                              <!--nav-block nav-block-center--> 
                              
                            </div>
                            <!--level0-wrapper2--> 
                          </div>
                          <!--container--> 
                        </div>
                        <!--level0-wrapper dropdown-6col--> 
                        <!--mega menu--> 
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="#"><span>Listing‎</span></a>
                        <ul class="level1">
                          <li class="level1 first"><a href="grid.html"><span>Car Grid</span></a></li>
                          <li class="level1 nav-10-2"> <a href="list.html"> <span>Car List</span> </a> </li>
                          <li class="level1 nav-10-3"> <a href="grid1.html"> <span>Accessories Grid</span> </a> </li>
                          <li class="level1 nav-10-4"> <a href="list1.html"> <span>Accessories List</span> </a> </li>
                          <li class="level1 first parent"><a href="car-detail.html"><span>Car Detail</span></a> </li>
                          <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories Detail</span></a> </li>
                        </ul>
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="#"><span>Blog</span></a>
                        <ul class="level1">
                          <li class="level1 first"><a href="blog.html"><span>Blog List</span></a></li>
                          <li class="level1 nav-10-2"> <a href="blog-detail.html"> <span>Blog Detail</span> </a> </li>
                        </ul>
                      </li>
                      <li class="mega-menu hidden-sm"> <a class="level-top" href="compare.html"><span>Compare Cars‎</span></a> </li>
                      <li class="level0 parent drop-menu"><a href="#"><span>Pages</span> </a> 
                        <!--sub sub category-->
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
                      <li class="fl-custom-tabmenulink mega-menu"> <a href="#" class="level-top"> <span>Custom</span> </a>
                        <div class="level0-wrapper fl-custom-tabmenu" style="left: 0px; display: none;">
                          <div class="container">
                            <div class="header-nav-dropdown-wrapper clearer">
                              <div class="grid12-3">
                                <div><img src="images/custom-img1.jpg" alt="custom-image"></div>
                                <h4 class="heading">SALE UP TO 30% OFF</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              </div>
                              <div class="grid12-3">
                                <div><img src="images/custom-img2.jpg" alt="custom-image"></div>
                                <h4 class="heading">SALE UP TO 30% OFF</h4>
                                <p>Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                              </div>
                              <div class="grid12-3">
                                <div><img src="images/custom-img3.jpg" alt="custom-image"></div>
                                <h4 class="heading">SALE UP TO 30% OFF</h4>
                                <p>Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.</p>
                              </div>
                              <div class="grid12-3">
                                <div><img src="images/custom-img4.jpg" alt="custom-image"></div>
                                <h4 class="heading">SALE UP TO 30% OFF</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
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
     <h2>Create an Account</h2>
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

        <form name="register" action="" method="post" id="login-form" onsubmit="return verif_registration()">
        <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
        
            
             <strong>Registration</strong>             
                <div class="content">
                    
                    <p>Fill the form please</p>
                    <?php
                      if($error != "")
                      {
                        echo $error;
                      }
                    ?>
                    <ul class="form-list">
                        <li>
                             <label for="first-name">First Name<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="text" name="fname" value="" class="input-text required-entry validate-email" title="First Name" required>
                            </div>
                        </li>
                        <li>
                            <label for="last-name">Last Name<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="text" name="lname" class="input-text required-entry validate-password" title="Last Name" required>
                            </div>
                        </li>
                        <li>
                            <label for="email">Email Address<em class="required">*</em></label>
                           <div class="input-box">
                               <input type="email" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email Address" required>
                           </div>
                       </li>
                        <li>
                            <label for="Address">Address<em class="required">*</em></label>
                            <div class="input-box">
                                <textarea name="ad"></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="phone-number">Phone Number<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="text" name="tel" class="input-text required-entry validate-password" title="Phone" required>
                            </div>
                        </li>
                        <li>
                            <label for="pass">Password<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="password" name="pass" class="input-text required-entry validate-password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" title="Password" required>
                            </div>
                        </li>
                        <li>
                            <label for="cpass">Confirm Password<em class="required">*</em></label>
                            <div class="input-box">
                                <input type="password" name="cpass" class="input-text required-entry validate-password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" title="CPassword" required>
                            </div>
                        </li>
                    </ul>
                    <div class="remember-me-popup">
    <div class="remember-me-popup-head" style="display:none">
        <h3 id="text2">What's this?</h3>
        <a href="#" class="remember-me-popup-close" onClick="showDiv()" title="Close">Close</a>
    </div>
    <div class="remember-me-popup-body" style="display:none">
        <p id="text1">Checking "Remember Me" will let you access your shopping cart on this computer when you are logged out</p>
        <div class="remember-me-popup-close-button a-right">
            <a href="#" class="remember-me-popup-close button" title="Close" onClick="
            showDiv()"><span>Close</span></a>
        </div>
    </div>
</div>

<p class="required">* Required Fields</p>



                     <div class="buttons-set">
                  
                    <button type="submit" class="button login" title="Login" name="send" id="send2"><span>Register</span></button>

                      <a href="login.html" class="forgot-word">Already registered ? Click Here !</a>
                 </div> <!--buttons-set-->
                  </div> <!--content-->                               
             <!--col-2 registered-users-->
                   </fieldset> <!--col2-set-->
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
<script type="text/javascript" src="js/controle.js"></script>


</body>

</html>