    <body>
        <div class="root-container">

            <div class="top-header site-accent-bg-dark">

                <div class="content center-align-bl" style="min-height:80px;" >

                    <div class="logo-container" style="margin-top:-24px;">
                        <a href="homepage.php">
                            <span class="site-font-l logo-large site-accent-fg">dc<span class="site-font-b">Library</span></span>
                        </a>
                    </div> <!-- end of logo container-->

                    <div style="position:absolute;right:10px;top:50%;margin-top:-15px;" >
                        <ul class="menu">
                            <li><p style="color:#fff;margin-top:6px;margin-right:10px;">Logged in as:&nbsp&nbsp <?php echo ucfirst($CurrentAdmin->name); ?></p></li>                    
                            <li><a class="border-button" href="<?php echo $header_paths['submit_forms'] . '/admin_logout_submit.php'; ?>">Log out</a></li>                            
                        </ul>
                    </div>

                    
                </div> 

            </div> <!-- end of top header-->

            <div class="top-header site-accent-bg-dark" style="min-height:40px;">

                <div class="content center-align-bl" style="min-height:40px;" >
                    
                        <div style="width:100%;text-align:center;min-height:40px;" >
                            <ul class="menu">
                                <li><a class="border-button" href="<?php echo $header_paths['public'] .'/admin/books.php'; ?>">Books</a></li>
                                <li><a class="border-button" href="#">Authors</a></li>
                                <li><a class="border-button" href="#">Users</a></li>
                                <li><a class="border-button" href="#">Checkouts</a></li>
                                <li><a class="border-button" href="#" >Checkins</a></li>                                                        
                            </ul>
                        </div>
                    
                </div>
            </div>