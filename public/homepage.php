<?php require_once('../config.php') ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo $header_paths['css'] . '/main-styles.css'; ?>" rel="stylesheet">
        <link href="<?php echo $header_paths['css'] . '/home-template-styles.css'; ?>" rel="stylesheet">
        <link href="<?php echo $header_paths['css'] . '/homepage-styles.css'; ?>" rel="stylesheet">     
              
    </head>

<?php require_once($paths['include'] . '/home_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

    <div class="slideshow-container" >

        <div class="slide fade">
            <div class="slide-image" style="background-image:url('../resources/images/book-shelf.jpg')"></div>
            <span class="center-align-in slide-text site-font-l"  >Welcome to the <span class="site-font-l" style="display:block;" >dcLibrary online</span></span>
        </div>

        <div class="slide fade">
            <div class="slide-image" style="background-image:url('../resources/images/explore-books.jpg')"></div>
            <span class="center-align-in slide-text site-font-l"  >Explore new <span class="site-font-l" style="display:block;" >books</span></span>
        </div>

        <div class="slide fade">
            <div class="slide-image" style="background-image:url('../resources/images/checking.jpg')"></div>
            <span class="center-align-in slide-text site-font-l"  >Never miss <span class="site-font-l" style="display:block;" >a checking</span></span>
        </div>

        <div class="slide fade">
            <div class="slide-image" style="background-image:url('../resources/images/habbit.jpg'); "></div>
            <span class="center-align-in slide-text site-font-l"  >Make reading<span class="site-font-l" style="display:block;" >a habit</span></span>
        </div>
        
    </div>

    <!-- slideshow js-->
    <script src="../js/slideshow.js">
    </script>

    <table class="sections-table">
        <tr>
            <td>
                <section>
                    <h3>What is dcLibrary online</h3>
                    <p>It's an online experience for registered users of the dcLibrary.</p>
                </section>
            </td>
            <td>
                <section>
                    <h3>Discover new books easily</h3>
                    <p>You can discover information about the latest books without visiting the physical library.</p>
                </section>
            </td>
            <td>
                <section>
                    <h3>Never miss a checkin</h3>
                    <p>You can easily manage your book shelf from your dashboard. So you can checkin books on time and earn points!</p>
                </section>
            </td>
            <td>
                <section>
                    <h3>Make reading a hobby</h3>
                    <p>Get inspired by the archivement system and transform reading into your favourite hobby. </p>
                </section>
            </td>
        </tr>
    </table>


</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           