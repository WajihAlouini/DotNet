<!DOCTYPE html>
<html lang="en">
<?php

session_start (); 
?>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Streamlab - Video Streaming HTML5 Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
    <title>Popup Box Example</title>
    <style>
        /* Style for the popup box */
        .popup {
            display: none; /* Hide popup by default */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            z-index: 999; /* Set a high z-index to ensure the popup appears on top of other content */
        }
        .popup-content {
            background-color: #f9f9f9;
            width: 500px;
            height:400px;
          
            margin: 100px auto; /* Center the popup vertically and horizontally */
            text-align: center;
            border-radius: 5px;
        }
        .close {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
       <style>
.rating-widget {
  font-size: 24px;
  
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
}

.rating-widget .star {
  cursor: pointer;
  color: #ccc;
  
}

.rating-widget .star:hover,
.rating-widget .star:hover ~ .star {
  color: #ffcc00;
}


</style>
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
                                        <li class="menu-item active">
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
                                                <li class="menu-item active">
                                                    <a href="single-movie.html">Single Movie</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
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
                                                        <li class="menu-item">
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


    <?PHP
include "./entities/books.php";
include "./core/booksC.php";

$movie1C=new BooksC();
$listemovie=$movie1C-> AfficherWriters();
$listegenre=$movie1C-> Affichertypes();

if (isset($_GET['id']) and isset($_GET['types_id'])){
    $BooksC = new BooksC();
    $result=$BooksC->recuperbook($_GET['id']);
    $liste = $BooksC->recuperbooksBytypes($_GET['types_id']);
    

    foreach($result as $row){
        $nomB=$row['nomB'];
        $DescB=$row['DescB'];
        $UrlB=$row['UrlB'];
        $duree=$row['duree'];
        $Released=$row['Released'];
        $imgB=$row['imgB'];
        $types_id=$row['type_name'];
        $writer_id=$row['writer_name'];
        $types=$row['types_id'];
       

        
    
?>
    <!-- Single movie Start -->
    <section class="gen-section-padding-3 gen-single-movie">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="gen-video-holder">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?PHP echo $UrlB ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div class="gen-single-movie-info">
                                    <h2 class="gen-title"><?PHP echo $nomB ?></h2>
                                    <div class="gen-single-meta-holder">
                                        <ul>
                                            <li class="gen-sen-rating">TV-PG</li>
                                           
                                        </ul>
                                    </div>
                                    <div class="rating-widget">
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 5 ,<?php echo $row['types_id']; ?>)" data-value="5" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 4,<?php echo $row['types_id']; ?>)" data-value="4" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 3,<?php echo $row['types_id']; ?>)" data-value="3" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 2,<?php echo $row['types_id']; ?>)" data-value="2" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 1,<?php echo $row['types_id']; ?>)" data-value="1" class="star">&#9733;</a>
</div>
<script>
// Load the saved rating from Local Storage
var savedRating = localStorage.getItem("rating_<?php echo $row['id']; ?>");
if (savedRating) {
  var stars = document.querySelectorAll('.rating-widget a.star');
  stars.forEach(function(star) {
    if (star.getAttribute('data-value') <= savedRating) {
      star.classList.add('selected');
    }
    if (star.getAttribute('data-value') < savedRating) {
      star.classList.add('disabled');
      star.removeAttribute('href');
    }
  });
}

function submitRating(booksId, rating ,typesId) {
  var savedRating = localStorage.getItem("rating_<?php echo $row['id']; ?>");
  if (savedRating) {
    return;
  }
  

  var url = "submit.php?id=" + booksId + "&types_id=" + typesId + "&rating=" + rating;
  var stars = document.querySelectorAll('.rating-widget a.star');
  stars.forEach(function(star) {
    if (star.getAttribute('data-value') <= rating) {
      star.classList.add('selected');
    }
    if (star.getAttribute('data-value') < rating) {
      star.classList.add('disabled');
      star.removeAttribute('href');
    }
  });
  localStorage.setItem("rating_<?php echo $row['id']; ?>", rating);
  stars.forEach(function(star) {
    star.removeAttribute('onclick');
  });
  window.location.href = url; // redirect to the URL
}
</script>



<style>
.rating-widget a.star.selected {
  color: orange;
}
</style>

                        
                                    <p style ="width:1200px; margin-top:30px ; margin-right:200px">
                                    <?PHP echo $row['DescB']; ?>
                                    </p>
                                    <div class="gen-after-excerpt">
                                        <div class="gen-extra-data">
                            


    </span>
                                                </li>





                                                <li>
                                                    <span>Writer :</span>
                                                    <span><?PHP echo $writer_id ?></span>
                                                </li>
                                                <li><span>Type :</span>
                                                    <span>
                                                        <a href="action.html">
                                                        <?PHP echo $types_id ?>,</a>
                                                    </span>
                                                   
                                                </li>
                                                <li><span>Run Time :</span>
                                                    <span><?PHP echo $duree ?> mins</span>
                                                </li>
                                                <li>
                                                    <span>Release Date :</span>
                                                    <span><?PHP echo $Released ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gen-socail-share">
                                            <h4 class="align-self-center">Social Share :</h4>
                                            <ul class="social-inner">
                                                <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?PHP
    }
}


?>
                            <div class="col-lg-12">
                                <div class="pm-inner">
                                    <div class="gen-more-like">
                                        <h5 class="gen-more-title">More Like This</h5>
                                        <div class="row">

                                        <?PHP
                                        
                                        foreach($liste as $row){
                                            $id=$row['id'];
                                            $nomB=$row['nomB'];
                                            $DescB=$row['DescB'];
                                            $UrlB=$row['UrlB'];
                                            $duree=$row['duree'];
                                            $Released=$row['Released'];
                                            $imgB=$row['imgB'];
                                            $types_id=$row['types_name'];
                                            $writer_id=$row['writer_name'];
                                            $types=$row['types_id'];
                                           
                                           
                                    
                                            
                                        
                                    ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                    <div class="gen-movie-contain">
                                                        <div class="gen-movie-img">
                                                        <img src="../admin/theme/uploads/<?PHP echo $imgB ?>" alt="streamlab-image">
                                                               
                                                            <div class="gen-movie-add">
                                                                <div class="wpulike wpulike-heart">
                                                                    <div
                                                                        class="wp_ulike_general_class wp_ulike_is_not_liked">
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
                                                                                        class="fab fa-twitter"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                                <div
                                                                    class="movie-actions--link_add-to-playlist dropdown">
                                                                    <a class="dropdown-toggle" href="#"
                                                                        data-toggle="dropdown"><i
                                                                            class="fa fa-plus"></i></a>
                                                                    <div class="dropdown-menu mCustomScrollbar">
                                                                        <div class="mCustomScrollBox">
                                                                            <div class="mCSB_container">
                                                                                <a class="login-link" href="#">Sign in
                                                                                    to add this movie to
                                                                                    a
                                                                                    playlist.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gen-movie-action">
                                                               
                                                                    
                                                                    
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                            <h3><a href="single-movie.php?id=<?PHP echo $id?>&types_id=<?PHP echo $types?>; ?>"><?PHP echo $nomB?></a></h3>
                                                            </div>
                                                            <div class="gen-movie-meta-holder">
                                                                <ul>
                                                                <li><?PHP echo $duree ?> mins</li>
                                                                    <li>
                                                                    <a href="action.html"><span><?PHP echo $types_id ?></span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?PHP
    }
   



?>
                                            
                                          
                                        
                                         
                                          
                                        
                                          
                                           
                                       
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single movie End -->

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