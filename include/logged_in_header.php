
<div class="root-container">

            <div class="top-header site-accent-bg-dark" style="min-height:50px;">

                <div class="content center-align-bl" style="min-height:50px;position:relative;" >

                    <div class="logo-container" style="margin-top:-18px;">
                        <a href="<?php echo $header_paths['public'] . '/homepage.php' ?>">
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
                            <li><a class="borderless-button" href="#">Explore</a></li>
                            <li><a class="borderless-button" href="#">My books</a></li>
                        </ul>
                    </div>

                    <!-- profile icon -->
                    <div class="profile-icon" id="profile-icon" >
                        <div class="profile-icon-div">
                            <span class="site-accent-fg site-font-m"><?php echo $CurrentUser->getFName(); ?></span>
                        </div>
                        <img class="profile-icon-img" src="<?php echo $header_paths['images'] . '/users/' . $CurrentUser->image;  ?>" alt="">
                        <div class="clickable" onclick="toggleDropdown();"></div>
                    </div>

                    <!-- dorpdown menu for the profile icon-->
                    <div class="dropdown-menu-container">
                        <div class="small-rectangle"></div>
                        <ul >
                            <li> <a href="#">My profile</a>   </li>
                            <li> <a href="#">Settings</a>   </li>
                            <li> <a href="<?php echo $header_paths['submit_forms'] . '/logout_submit.php'; ?>">Log out</a>   </li>
                            
                        </ul>
                    </div>

                     <!-- dropdown manupilation script-->
                    <script src="<?php echo $header_paths['js'] . '/dropdowns.js'; ?>"></script>
                </div> <!-- end of content container-->

            </div> <!-- end of top header-->
