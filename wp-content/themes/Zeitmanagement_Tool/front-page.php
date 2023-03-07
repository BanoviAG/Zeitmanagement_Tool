<?php
require ('template-parts/validation/validateUser.php')
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-12 front-page">

                    <?php global $current_user; wp_get_current_user(); ?>
                    <h1>Willkommen <b><?php echo $current_user->user_login; ?></b></h1>

                    <div>

                        
                        
                        <div>
                            
                            <form id="start">
                                
                                <div class="timer">
                                    
                                    <img src="//localhost/Zeitmanagement_Tool/wp-content/uploads/2023/03/clock.png" width="25%" height="25%"> 
                                    
                                </div>
                                
                                <button type="submit" name="start" id="start" class="startButton mt-3">Start</button>
                                
                            </form>

                            <form id="pause">

                                <div class="timer">

                                    <img src="//localhost/Zeitmanagement_Tool/wp-content/uploads/2023/03/clock.gif" width="28%" height="25%">

                                </div>
                                
                                <button type="submit" name="pause" id="pause" class="pauseButton mt-3">Pause</button>
                                
                            </form>
                            
                            <div id="output" class="mt-3">
                                
                                00:00:00
                                
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

<?php get_footer(); ?>