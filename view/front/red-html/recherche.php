
<?php
include_once '../../../config.php';
include_once '../../../controller/iptv_channelC.php';

$categoryC=new  channelC();
$prod=$categoryC->recherche($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Hostingo HTML5 Template" />
    <meta name="description" content="Hostingo Html5 template" />
    <meta name="author" content="Hostingo" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hostingo HTML5 Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
        <div class="gen-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="#">
                                <img class="img-fluid logo" src="images/logo-1.png" alt="streamlab-image">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="gen-menu-contain" class="gen-menu-contain">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item">
                                            <a href="#" aria-current="page">Home</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="index.html" aria-current="page">Main Home</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="movies-home.html" aria-current="page">Movies Home</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="tv-shows-home.html" aria-current="page">Tv Shows Home</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="video-home.html" aria-current="page">Video Home</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Movies</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Movies List</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="movies-load-more.html">Load More</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="movies-infinite-scroll.html">Infinite scroll</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="movies-pagination.html">Pagination</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Movies Style</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="movies-style-1.html">Style 1</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="movies-style-2.html">Style 2</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="movies-style-3.html">Style 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="single-movie.html">Single Movie</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item active">
                                            <a href="#">Tv Shows</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Tv Shows List</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="tv-shows-load-more.html">Load More</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="tv-shows-infinite-scroll.html">Infinite scroll</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="tv-shows-pagination.html">Pagination</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Tv Shows Style</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item active">
                                                            <a href="tv-shows-style-1.html">Style 1</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="tv-shows-style-2.html">Style 2</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="tv-shows-style-3.html">Style 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="single-tv-shows.html">Single Tv Shows</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="single-episode.html">Single Episode</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Video</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Video</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="video-load-more.html">Load More</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="video-infinite-scroll.html">Infinite scroll</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="video-pagination.html">Pagination</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Videos Style</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="videos-style-1.html">Style 1</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="videos-style-2.html">Style 2</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="videos-style-3.html">Style 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="single-videos.html">Single videos</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Pages</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Blog</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item menu-item-has-children">
                                                            <a href="#">Blog With Sidebar</a>
                                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                            <ul class="sub-menu">
                                                                <li class="menu-item">
                                                                    <a href="blog-left-sidebar.html">blog left
                                                                        sidebar</a>
                                                                </li>
                                                                <li class="menu-item">
                                                                    <a href="blog-right-sidebar.html">blog right
                                                                        sidebar</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Pricing</a>
                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item">
                                                            <a href="pricing-style-1.html">Style 1</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="pricing-style-2.html">Style 2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="contact-us.html">Contact Us</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gen-header-info-box">
                                <div class="gen-menu-search-block">
                                    <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                    <div class="gen-search-form">
                                        <form role="search" method="get" class="search-form" action="#">
                                            <label>
                                                <span class="screen-reader-text"></span>
                                                <input type="search" class="search-field" placeholder="Search …"
                                                    value="" name="s">
                                            </label>
                                            <button type="submit" class="search-submit"><span
                                                    class="screen-reader-text"></span></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="gen-account-holder">
                                    <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                    <div class="gen-account-menu">
                                        <ul class="gen-account-menu">
                                            <!-- Pms Menu -->
                                            <li>
                                                <a href="log-in.html"><i class="fas fa-sign-in-alt"></i>
                                                    login </a>
                                            </li>
                                            <li>
                                                <a href="register.html"><i class="fa fa-user"></i>
                                                    Register </a>
                                            </li>
                                            <!-- Library Menu -->
                                            <li>
                                                <a href="library.html">
                                                    <i class="fa fa-indent"></i>
                                                    Library </a>
                                            </li>
                                            <li>
                                                <a href="library.html"><i class="fa fa-list"></i>
                                                    Movie Playlist </a>
                                            </li>
                                            <li>
                                                <a href="library.html"><i class="fa fa-list"></i>
                                                    Tv Show Playlist </a>
                                            </li>
                                            <li>
                                                <a href="library.html"><i class="fa fa-list"></i>
                                                    Video Playlist </a>
                                            </li>
                                            <li>
                                                <a href="upload-video.html"> <i class="fa fa-upload"></i>
                                                    Upload Video </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="gen-btn-container">
                                    <a href="register.html" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Subscribe</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                TV Shows
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">TV Show</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">
                                                              <?php
foreach($prod as $pro){

?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            
                                             <?php echo"<img src='../../back/theme/uploads/".$pro['image']."'>" ?>
          


                                            <div class="gen-movie-add">
                                                <div class="wpulike wpulike-heart">
                                                    <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                        <button type="button"
                                                            class="wp_ulike_btn wp_ulike_put_image"></button>
                                                    </div>
                                                </div>
                                                <ul class="menu bottomRight">
                                                    <li class="share top">
                                                        <i class="fa fa-share-alt"></i>
                                                        <ul class="submenu">
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-instagram"></i></a>
                                                            </li>
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="movie-actions--link_add-to-playlist dropdown">
                                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                            class="fa fa-plus"></i></a>
                                                    <div class="dropdown-menu mCustomScrollbar">
                                                        <div class="mCustomScrollBox">
                                                            <div class="mCSB_container">
                                                                <a class="login-link" href="<?php echo $pro['url'] ?>">Sign in to add this
                                                                    movie to a
                                                                    playlist.</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                           <!--  <div class="gen-movie-action">
                                                <a href="single-tv-shows.html" class="gen-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a href="<?php echo $pro['url'] ?>"><?php echo $pro['nom_channel'] ?></a></h3>
                                            </div>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li><a href="<?php echo $pro['url'] ?>"> </a><?php echo $pro['url'] ?></li>
                                                    <li>
                                                        <a href="adventure.html"><span>Adventure</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form action="ajouetrraitin.php" method="POST">
                                            <div>
                                                  <input type="hidden"  name="id" value="<?php echo $pro['id_channel'] ?>">
  <input type="radio" id="star-5" name="rating" value="1">
  <label for="star-5">&#9733;</label>
  <input type="radio" id="star-4" name="rating" value="2">
  <label for="star-4">&#9733;</label>
  <input type="radio" id="star-3" name="rating" value="3">
  <label for="star-3">&#9733;</label>
  <input type="radio" id="star-2" name="rating" value="4">
  <label for="star-2">&#9733;</label>
  <input type="radio" id="star-1" name="rating" value="5">
  <label for="star-1">&#9733;</label>
</div> 
   <button type="submit" class="btn btn-link">Rating</button>
</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                   <?php
}

?>
                  
                            
                    
                          
                          
                            
                        
                    
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gen-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="page-numbers">
                                <li><span aria-current="page" class="page-numbers current">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="next page-numbers" href="#">Next page</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->

    <!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="images/logo-1.png" class="gen-footer-logo" alt="gen-footer-logo">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <ul class="social-link">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-skype"></i></a></li>
                                            <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Explore</h4>
                                <div class="menu-explore-container">
                                    <ul class="menu">
                                        <li class="menu-item">
                                            <a href="index.html" aria-current="page">Home</a>
                                        </li>
                                        <li class="menu-item"><a href="movies-pagination.html">Movies</a></li>
                                        <li class="menu-item"><a href="tv-shows-pagination.html">Tv Shows</a></li>
                                        <li class="menu-item"><a href="video-pagination.html">Videos</a></li>
                                        <li class="menu-item"><a href="#">Actors</a></li>
                                        <li class="menu-item"><a href="#">Basketball</a></li>
                                        <li class="menu-item"><a href="#">Celebrity</a></li>
                                        <li class="menu-item"><a href="#">Cross</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Company</h4>
                                <div class="menu-about-container">
                                    <ul class="menu">
                                        <li class="menu-item"><a href="contact-us.html">Company</a>
                                        </li>
                                        <li class="menu-item"><a href="contact-us.html">Privacy
                                                Policy</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Terms Of
                                                Use</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Help
                                                Center</a></li>
                                        <li class="menu-item"><a href="contact-us.html">contact us</a></li>
                                        <li class="menu-item"><a href="pricing-style-1.html">Subscribe</a></li>
                                        <li class="menu-item"><a href="#">Our Team</a></li>
                                        <li class="menu-item"><a href="contact-us.html">Faq</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Downlaod App</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                        <a href="#">
                                            <img src="images/asset-35.png" class="gen-playstore-logo" alt="playstore">
                                        </a>
                                        <a href="#">
                                            <img src="images/asset-36.png" class="gen-appstore-logo" alt="appstore">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a target="_blank" href="#"> Copyright 2021 stremlab All Rights
                                    Reserved.</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/asyncloader.min.js"></script>
    <!-- JS bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- counter-js -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- popper-js -->
    <script src="js/popper.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Iscotop -->
    <script src="js/isotope.pkgd.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/slick.min.js"></script>

    <script src="js/streamlab-core.js"></script>

    <script src="js/script.js"></script>


</body>

</html>