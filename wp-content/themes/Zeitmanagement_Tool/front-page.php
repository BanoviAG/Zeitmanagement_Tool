<?php
require ('template-parts/validation/validateUser.php')
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                        <?php global $current_user; wp_get_current_user(); ?>
                        <h1>Willkommen <?php echo $current_user->user_login; ?></h1>

                    <div>

                        <div id="output">

                            00:00:00

                        </div>

                        <div>

                            <form id="start">

                                <button type="submit" name="start" id="start" class="startButton">Start</button>

                            </form>

                            <form id="pause">

                                <button type="submit" name="pause" id="pause" class="pauseButton">Pause</button>
                                
                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-4">

                </div>

            </div>

        </div>

    </main>

</div>

<?php get_footer(); ?>