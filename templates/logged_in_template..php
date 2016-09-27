<?php require_once('../config.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo $header_paths['css'] . '/main-styles.css'; ?>" rel="stylesheet">
        <link href="<?php echo $header_paths['css'] . '/home-template-styles.css'; ?>" rel="stylesheet">
        <link href="<?php echo $header_paths['css'] . '/logged-in-styles.css'; ?>" rel="stylesheet">        
    </head>

    
 <body>
        <div class="root-container">

            <div class="top-header site-accent-bg-dark" style="min-height:50px;">

                <div class="content center-align-bl" style="min-height:50px;position:relative;" >

                    <div class="logo-container" style="margin-top:-18px;">
                        <a href="homepage.php">
                            <span class="site-font-l logo-medium site-accent-fg">dc<span class="site-font-b">Library</span></span>
                        </a>
                    </div> <!-- end of logo container-->
                    
                    <div class="searchbox-container">
                        <form action="" onsubmit="return submitSearch();">
                            <input id="searchText" class="searchbox" type="text" placeholder="Search books, authors..." >
                            <input type="submit" class="searchbox" id="searchSubmit" value="" />
                        </form>
                    </div>
                    
                    <!-- validation script-->
                    <script src="<?php echo $header_paths['js'] . '/validations.js'; ?>"></script>
                    
                    <div style="margin-top: -50px;height: 50px;max-width: 300px;margin-left: 500px;" >
                        <ul class="menu" style="padding-top:9px;">
                            <li><a class="borderless-button" href="register.php">Explore</a></li>
                            <li><a class="borderless-button" href="login.php">My books</a></li>
                        </ul>
                    </div>

                    <!-- profile icon -->
                    <div class="profile-icon" id="profile-icon" >
                        <div class="profile-icon-div">
                            <span class="site-accent-fg site-font-m">Nuwan</span>
                        </div>
                        <img class="profile-icon-img" src="../images/users/user(10).png" alt="">
                        <div class="clickable" onclick="toggleDropdown();"></div>
                    </div>

                    <!-- dorpdown menu for the profile icon-->
                    <div class="dropdown-menu-container">
                        <div class="small-rectangle"></div>
                        <ul >
                            <li> <a href="#">My profile</a>   </li>
                            <li> <a href="#">Settings</a>   </li>
                            <li> <a href="#">Log out</a>   </li>
                            
                        </ul>
                    </div>

                     <!-- dropdown manupilation script-->
                    <script src="<?php echo $header_paths['js'] . '/dropdowns.js'; ?>"></script>
                </div> <!-- end of content container-->

            </div> <!-- end of top header-->

            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>