
<?php
// Set database connection details
$host = 'localhost';
$dbname = 'topia';
$username = 'root';
$password = '';

// Connect to database using PDO
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Define function to calculate rating mean
function calculateRatingMean()
{
    global $db;

    try {
        // Select the distinct product IDs and names from the rate and produit tables
        $sql = "SELECT DISTINCT r.movie_id, m.nom
                FROM rate r 
                INNER JOIN movie m ON r.movie_id = m.id";
        $movies = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // Iterate through each product and calculate its average rating
        $averages = array();
        foreach ($movies as $movie) {
            $sql = "SELECT AVG(rating) AS average FROM rate WHERE movie_id = :movieId";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':movieId', $movie['movie_id'], PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $average = $result['average'];
            if ($average !== null) {
                $averages[] = array(
                    'movie_id' => $movie['movie_id'],
                    'movie_name' => $movie['nom'],
                    'rating_average' => $average
                );
            }
        }

        return $averages;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


$averages = calculateRatingMean();

$chart_data = '';
foreach ($averages as $average) {
    $chart_data .= "{ movie_id:'".$average['movie_id']."', movie_name:'".$average['movie_name']."', rating_average:".$average['rating_average']."}, ";
}
$chart_data = substr($chart_data, 0, -2);


?>



<!doctype html>
<html lang="en">
<?php

session_start (); 
?>
<!-- Mirrored from templates.iqonic.design/streamit/dashboard/html/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2023 15:49:23 GMT -->
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Streamit - Responsive Bootstrap 4 Admin Dashboard Template</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="https://templates.iqonic.design/streamit/dashboard/html/assets/images/favicon.ico" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <!--datatable CSS -->
   <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="../assets/css/typography.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="../assets/css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="../assets/css/responsive.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
</head>
<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="index.html" class="header-logo">
               <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="">
               <div class="logo-title">
                  <span class="text-primary text-uppercase">Streamit</span>
               </div>
            </a>
            <div class="iq-menu-bt-sidebar">
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
               <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li><a href="index.html" class="text-primary"><i class="ri-arrow-right-line"></i><span>Visit site</span></a></li>
                  <li class="active active-menu"><a href="index.html" class="iq-waves-effect"><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
                  <li><a href="rating.html" class="iq-waves-effect"><i class="las la-star-half-alt"></i><span>Rating </span></a></li>
                  <li><a href="comment.html" class="iq-waves-effect"><i class="las la-comments"></i><span>Comment</span></a></li>
                  <li><a href="user.html" class="iq-waves-effect"><i class="las la-user-friends"></i><span>User</span></a></li>
                  <li>
                     <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-list-ul"></i><span>Category</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="add-category.html"><i class="las la-user-plus"></i>Add Category</a></li>
                        <li><a href="category-list.html"><i class="las la-eye"></i>Category List</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="#movie" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-film"></i><span>Movie</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="movie" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="MovieA.php"><i class="las la-user-plus"></i>Add Movie</a></li>
                        <li><a href="MovieL.php"><i class="las la-user-plus"></i>Movie list</a></li>
                        <li><a href="add-movie.php"><i class="las la-user-plus"></i>Add Actor</a></li>
                        <li><a href="movie-list.php"><i class="las la-eye"></i>Actors List</a></li>
                        <li><a href="add-genre.php"><i class="las la-user-plus"></i>Add genre</a></li>
                        <li><a href="genre-list.php"><i class="las la-user-plus"></i>genre list</a></li>
                        
                     </ul>
                  </li>

                  <li>
                     <a href="#Book" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-book"></i><span>Audio Books</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="Book" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="BookA.php"><i class="las la-user-plus"></i>Add Book</a></li>
                        <li><a href="BookL.php"><i class="las la-user-plus"></i>Books list</a></li>
                        <li><a href="Add-books.php"><i class="las la-user-plus"></i>Add Writer</a></li>
                        <li><a href="writer-list.php"><i class="las la-eye"></i>Writer List</a></li>
                        <li><a href="add-type.php"><i class="las la-user-plus"></i>Add Type</a></li>
                        <li><a href="type-list.php"><i class="las la-user-plus"></i>Types list</a></li>
                        
                     </ul>
                  </li>
             
                  <li>
                     <a href="#show" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                        class="las la-film"></i><span>Show</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i>
                     </a>
                     <ul id="show" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="add-show.html"><i class="las la-user-plus"></i>Add Show</a></li>
                        <li><a href="show-list.html"><i class="las la-eye"></i>Show List</a></li>
                     </ul>
                  </li>
                  <li><a href="pages-pricing.html" class="iq-waves-effect"><i class="ri-price-tag-line"></i><span>Pricing</span></a></li>
                  <li>
                     <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>UI Elements</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="elements">
                           <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>UI Kit</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="sub-menu" class="iq-submenu collapse" data-parent="#ui-elements">
                              <li><a href="ui-colors.html"><i class="las la-palette"></i>colors</a></li>
                              <li><a href="ui-typography.html"><i class="las la-keyboard"></i>Typography</a></li>
                              <li><a href="ui-alerts.html"><i class="las la-tag"></i>Alerts</a></li>
                              <li><a href="ui-badges.html"><i class="lab la-atlassian"></i>Badges</a></li>
                              <li><a href="ui-breadcrumb.html"><i class="las la-bars"></i>Breadcrumb</a></li>
                              <li><a href="ui-buttons.html"><i class="las la-tablet"></i>Buttons</a></li>
                              <li><a href="ui-cards.html"><i class="las la-credit-card"></i>Cards</a></li>
                              <li><a href="ui-carousel.html"><i class="las la-film"></i>Carousel</a></li>
                              <li><a href="ui-embed-video.html"><i class="las la-video"></i>Video</a></li>
                              <li><a href="ui-grid.html"><i class="las la-border-all"></i>Grid</a></li>
                              <li><a href="ui-images.html"><i class="las la-images"></i>Images</a></li>
                              <li><a href="ui-list-group.html"><i class="las la-list"></i>list Group</a></li>
                              <li><a href="ui-media-object.html"><i class="las la-ad"></i>Media</a></li>
                              <li><a href="ui-modal.html"><i class="las la-columns"></i>Modal</a></li>
                              <li><a href="ui-notifications.html"><i class="las la-bell"></i>Notifications</a></li>
                              <li><a href="ui-pagination.html"><i class="las la-ellipsis-h"></i>Pagination</a></li>
                              <li><a href="ui-popovers.html"><i class="las la-eraser"></i>Popovers</a></li>
                              <li><a href="ui-progressbars.html"><i class="las la-hdd"></i>Progressbars</a></li>
                              <li><a href="ui-tabs.html"><i class="las la-database"></i>Tabs</a></li>
                              <li><a href="ui-tooltips.html"><i class="las la-magnet"></i>Tooltips</a></li>
                           </ul>
                        </li>
                        <li class="form">
                           <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-wpforms"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="forms" class="iq-submenu collapse" data-parent="#ui-elements">
                              <li><a href="form-layout.html"><i class="las la-book"></i>Form Elements</a></li>
                              <li><a href="form-validation.html"><i class="las la-edit"></i>Form Validation</a></li>
                              <li><a href="form-switch.html"><i class="las la-toggle-off"></i>Form Switch</a></li>
                              <li><a href="form-chechbox.html"><i class="las la-check-square"></i>Form Checkbox</a></li>
                              <li><a href="form-radio.html"><i class="ri-radio-button-line"></i>Form Radio</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#wizard-form" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="wizard-form" class="iq-submenu collapse" data-parent="#ui-elements">
                              <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Simple Wizard</a></li>
                              <li><a href="form-wizard-validate.html"><i class="ri-clockwise-2-line"></i>Validate Wizard</a></li>
                              <li><a href="form-wizard-vertical.html"><i class="ri-anticlockwise-line"></i>Vertical Wizard</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-table-line"></i><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="tables" class="iq-submenu collapse" data-parent="#ui-elements">
                              <li><a href="tables-basic.html"><i class="ri-table-line"></i>Basic Tables</a></li>
                              <li><a href="data-table.html"><i class="ri-database-line"></i>Data Table</a></li>
                              <li><a href="table-editable.html"><i class="ri-refund-line"></i>Editable Table</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#icons" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-list-check"></i><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="icons" class="iq-submenu collapse" data-parent="#ui-elements">
                              <li><a href="icon-dripicons.html"><i class="ri-stack-line"></i>Dripicons</a></li>
                              <li><a href="icon-fontawesome-5.html"><i class="ri-facebook-fill"></i>Font Awesome 5</a></li>
                              <li><a href="icon-lineawesome.html"><i class="ri-keynote-line"></i>line Awesome</a></li>
                              <li><a href="icon-remixicon.html"><i class="ri-remixicon-line"></i>Remixicon</a></li>
                              <li><a href="icon-unicons.html"><i class="ri-underline"></i>unicons</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-alt iq-arrow-left"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li>
                           <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="authentication" class="iq-submenu collapse" data-parent="#pages">
                              <li><a href="sign-in.html"><i class="las la-sign-in-alt"></i>Login</a></li>
                              <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
                              <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
                              <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
                              <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                           <ul id="extra-pages" class="iq-submenu collapse" data-parent="#pages">
                              <li><a href="pages-timeline.html"><i class="ri-map-pin-time-line"></i>Timeline</a></li>
                              <li><a href="pages-invoice.html"><i class="ri-question-answer-line"></i>Invoice</a></li>
                              <li><a href="blank-page.html"><i class="ri-invision-line"></i>Blank Page</a></li>
                              <li><a href="pages-error.html"><i class="ri-error-warning-line"></i>Error 404</a></li>
                              <li><a href="pages-error-500.html"><i class="ri-error-warning-line"></i>Error 500</a></li>
                           
                              <li><a href="pages-maintenance.html"><i class="ri-archive-line"></i>Maintenance</a></li>
                              <li><a href="pages-comingsoon.html"><i class="ri-mastercard-line"></i>Coming Soon</a></li>
                              <li><a href="pages-faq.html"><i class="ri-compasses-line"></i>Faq</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar">
         <div class="iq-navbar-custom">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
               <div class="iq-menu-bt d-flex align-items-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
                  <div class="iq-navbar-logo d-flex justify-content-between">
                     <a href="index.html" class="header-logo">
                        <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="">
                        <div class="logo-title">
                           <span class="text-primary text-uppercase">Streamit</span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="iq-search-bar ml-auto">
                  <form action="#" class="searchbox">
                     <input type="text" class="text search-input" placeholder="Search Here...">
                     <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                  </form>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto navbar-list">
                     <li class="nav-item nav-icon search-content">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-search-line"></i>
                        </a>
                        <form action="#" class="search-box p-0">
                           <input type="text" class="text search-input" placeholder="Type here to search...">
                           <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </form>
                     </li>
                     <li class="nav-item nav-icon">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-notification-2-line"></i>
                           <span class="bg-primary dots"></span>
                        </a>
                        <div class="iq-sub-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                 </div>
                                 <a href="#" class="iq-sub-card" >
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/01.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Emma Watson Barry</h6>
                                          <small class="float-right font-size-12">Just Now</small>
                                          <p class="mb-0">95 MB</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card" >
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/02.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">New customer is join</h6>
                                          <small class="float-right font-size-12">5 days ago</small>
                                          <p class="mb-0">Cyst Barry</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card" >
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/03.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Two customer is left</h6>
                                          <small class="float-right font-size-12">2 days ago</small>
                                          <p class="mb-0">Cyst Barry</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card" >
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/04.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">New Mail from Fenny</h6>
                                          <small class="float-right font-size-12">3 days ago</small>
                                          <p class="mb-0">Cyst Barry</p>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="nav-item nav-icon dropdown">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-mail-line"></i>
                           <span class="bg-primary dots"></span>
                        </a>
                        <div class="iq-sub-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                 </div>
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/01.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Barry Emma Watson</h6>
                                          <small class="float-left font-size-12">13 Jun</small>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/02.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                          <small class="float-left font-size-12">20 Apr</small>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/03.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Why do we use it?</h6>
                                          <small class="float-left font-size-12">30 Jun</small>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/04.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Variations Passages</h6>
                                          <small class="float-left font-size-12">12 Sep</small>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="../assets/images/user/05.jpg" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                          <small class="float-left font-size-12">5 Dec</small>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="../assets/images/user/1.jpg" class="img-fluid rounded-circle mr-3" alt="user">
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello Barry Tech</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-lock-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Privacy Settings</h6>
                                          <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8">
                  <div class="row">
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0">
                                       view
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-primary">
                                    <i class="las la-eye"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+24K</h4>
                                 <p class="mb-0 text-primary"><span><i class="fa fa-caret-down mr-2"></i></span>35%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                       Rated This App
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-warning">
                                    <i class="lar la-star"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+55K</h4>
                                 <p class="mb-0 text-warning"><span><i class="fa fa-caret-up mr-2"></i></span>50%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                       Downloaded
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-info">
                                    <i class="las la-download"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+1M</h4>
                                 <p class="mb-0 text-info"><span><i class="fa fa-caret-up mr-2"></i></span>80%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-uppercase">
                                    <p class="mb-0 font-size-14">
                                       Visitors
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-success">
                                    <i class="lar la-user"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+2M</h4>
                                 <p class="mb-0 text-success"><span><i class="fa fa-caret-up mr-2"></i></span>80%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                           <h4 class="card-title">Top Rated Item </h4>
                        </div>
                        <div id="top-rated-item-slick-arrow" class="slick-aerrow-block  iq-rtl-direction"></div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row top-rated-item mb-0 iq-rtl-direction">
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/01.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">The Last Breath</h6>
                                       <p class="mb-0 mt-2">T.v show</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 134</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 30 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/02.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">Last Night</h6>
                                       <p class="mb-0 mt-2">Movie</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 133</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 20 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/03.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">Jeon Woochie</h6>
                                       <p class="mb-0 mt-2">Movie</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 222</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 40 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/04.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">Dino Land</h6>
                                       <p class="mb-0 mt-2">T.v show</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 122</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 25 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/05.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">Last Race</h6>
                                       <p class="mb-0 mt-2">T.v show</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 144</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 35 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="../assets/images/dashboard/06.jpg" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">Opend Dead Shot</h6>
                                       <p class="mb-0 mt-2">T.v show</p>
                                       <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 134</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 30 k</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
         
               <div class="col-lg-4">
                  <div class="iq-card iq-card iq-card-block iq-card-stretch iq-card-height">
                    

                     <div class="container" style="width:260px;">
   <h2 align="center">Movie Rating</h2>
  
   <br /><br />
   <div id="chart"></div>


   <?php
$data = [];
foreach ($averages as $average) {
  $rating_average_formatted = number_format($average['rating_average'], 2);
  $data[] = [$average['movie_name'] . ' (' . $rating_average_formatted . ')', $average['rating_average']];
}
?>

<script>
var chart = c3.generate({
  bindto: '#chart',
  data: {
    columns: <?php echo json_encode($data); ?>,
    type: 'donut'
  },
  donut: {
    title: "Movies Rating",
    width: 50,
    class: 'donut-title'
  },
  tooltip: {
    format: {
      value: function(value, ratio, id, index) {
        return value.toFixed(2) + '%';
      }
    }
  },
  legend: {
    show: true,
    item: {
      style: {
        "fill": "#fff"
      }
    },
    style: {
      "color": "#fff"
    }
  },
  onrendered: function() {
    d3.selectAll('.c3-legend-item text')
      .style('fill', '#fff');
  }
});

// Add CSS to the donut title element
var donutTitle = document.querySelector('.c3-chart-arcs-title');
donutTitle.style.fill = "#fff";


</script>
                   
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12  col-lg-4">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <?php
include 'statbooks.php';
?>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex align-items-center justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Top Category</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                           <div class="iq-custom-select d-inline-block sea-epi s-margin">
                              <select name="cars" class="form-control season-select">
                                 <option value="season1">Today</option>
                                 <option value="season2">This Week</option>
                                 <option value="season2">This Month</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body row align-items-center">
                        <div class="col-lg-7">
                           <div class="row list-unstyled mb-0 pb-0">
                              <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-primary">
                                    <span class="bg-primary" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                 </div>
                                 <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-primary"><i class="las la-film font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <h6 class="mb-0 font-size-14 line-height">Actions</h6>
                                       <small class="text-primary mb-0">+34%</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-secondary">
                                    <span class="bg-secondary" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 70%;"></span>
                                 </div>
                                 <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-secondary"><i class="las la-laugh-squint font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <p class="mb-0 font-size-14 line-height">Comedy</p>
                                       <small class="text-secondary mb-0">+44%</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-info">
                                    <span class="bg-info" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                 </div>
                                 <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-info"><i class="las la-skull-crossbones font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <p class="mb-0 font-size-14 line-height">Horror</p>
                                       <small class="text-info mb-0">+56%</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-warning">
                                    <span class="bg-warning" data-percent="100" style="transition: height 2s ease 0s; width: 40%; height: 40%;"></span>
                                 </div>
                                 <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-warning"><i class="las la-theater-masks font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <p class="mb-0 font-size-14 line-height">Drama</p>
                                       <small class="text-warning mb-0">+65%</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-6 mb-lg-0 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-success">
                                    <span class="bg-success" data-percent="100" style="transition: height 2s ease 0s; width: 60%; height: 60%;"></span>
                                 </div>
                                 <div class="media align-items-center mb-lg-0 mb-3">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-success"><i class="las la-child font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <p class="mb-0 font-size-14 line-height">Kids</p>
                                       <small class="text-success mb-0">+74%</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-md-4 col-lg-6  mb-lg-0 mb-3">
                                 <div class="iq-progress-bar progress-bar-vertical iq-bg-danger">
                                    <span class="bg-danger" data-percent="100" style="transition: height 2s ease 0s; width: 80%; height: 80%;"></span>
                                 </div>
                                 <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-danger"><i class="las la-grin-beam font-size-32"></i></div>
                                    <div class="media-body text-white">
                                       <p class="mb-0 font-size-14 line-height">Thrilled</p>
                                       <small class="text-danger mb-0">+40%</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-5">
                           <div id="view-chart-02" class="view-cahrt-02"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Recently Viewed Items</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                           <div class="iq-custom-select d-inline-block sea-epi s-margin">
                              <select name="cars" class="form-control season-select">
                                 <option value="season1">Most Likely</option>
                                 <option value="season2">Unlikely</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table movie_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:20%;">Movie</th>
                                    <th style="width:10%;">Rating</th>
                                    <th style="width:20%;">Category</th>
                                    <th style="width:10%;">Download/Views</th>
                                    <th style="width:10%;">User</th>
                                    <th style="width:20%;">Date</th>
                                    <th style="width:10%;"><i class="lar la-heart"></i></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="../assets/images/movie-thumb/01.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Champions</p>
                                             <small>1h 40m</small>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 9.2</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>21 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td >
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="../assets/images/show-thumb/05.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Last Race</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 7.2</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>subcriber</td>
                                    <td>22 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="../assets/images/show-thumb/07.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Boop Bitty</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.2</td>
                                    <td>Thriller</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>23 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="../assets/images/show-thumb/10.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">Dino Land</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.5</td>
                                    <td>Action</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>Unsubcriber</td>
                                    <td>24 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                                          <div class="iq-movie">
                                             <a href="javascript:void(0);"><img src="../assets/images/show-thumb/04.jpg" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">The Last Breath</p>
                                          </div>
                                       </div>
                                    </td>
                                    <td><i class="lar la-star mr-2"></i> 8.9</td>
                                    <td>Horror</td>
                                    <td>
                                       <i class="lar la-eye "></i>
                                    </td>
                                    <td>subcriber</td>
                                    <td>25 July,2020</td>
                                    <td><i class="las la-heart text-primary"></i></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
   <div class="rtl-box">
   <button type="button" class="btn btn-light rtl-btn">
         <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">
         <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
         </svg>
   </button>
   <div class="rtl-panel">
      <ul class="modes">
         <li class="dir-btn" data-mode="rtl" data-active="false"   data-value="ltr"><a href="#">LTR</a></li>
         <li class="dir-btn" data-mode="rtl" data-active="true"   data-value="rtl"><a href="#">RTL</a></li>
      </ul>
   </div>
</div>
   <!-- Footer -->
   <footer class="iq-footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                  <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
               </ul>
            </div>
            <div class="col-lg-6 text-right">
               Copyright 2020 <a href="#">Streamit</a> All Rights Reserved.
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/popper.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/jquery.dataTables.min.js"></script>
   <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
   <!-- Appear JavaScript -->
   <script src="../assets/js/jquery.appear.js"></script>
   <!-- Countdown JavaScript -->
   <script src="../assets/js/countdown.min.js"></script>
   <!-- Select2 JavaScript -->
   <script src="../assets/js/select2.min.js"></script>
   <!-- Counterup JavaScript -->
   <script src="../assets/js/waypoints.min.js"></script>
   <script src="../assets/js/jquery.counterup.min.js"></script>
   <!-- Wow JavaScript -->
   <script src="../assets/js/wow.min.js"></script>
   <!-- Slick JavaScript -->
   <script src="../assets/js/slick.min.js"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="../assets/js/owl.carousel.min.js"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="../assets/js/jquery.magnific-popup.min.js"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="../assets/js/smooth-scrollbar.js"></script>
   <!-- apex Custom JavaScript -->
   <script src="../assets/js/apexcharts.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="../assets/js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="../assets/js/custom.js"></script>
<script src="../assets/js/rtl.js"></script>
</body>

<!-- Mirrored from templates.iqonic.design/streamit/dashboard/html/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2023 15:49:48 GMT -->
</html>