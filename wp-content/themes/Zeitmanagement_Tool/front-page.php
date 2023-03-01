<?php
if ( !is_user_logged_in()) {

wp_redirect( 'http://localhost/Zeitmanagement_Tool/login/' ); 
    exit;
   } else {
    get_header();
   }
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row">

                <div class="col-8">

                    

                </div>

                <div class="col-4">



                </div>

            </div>

        </div>

    </main>

</div>

<?php get_footer(); ?>