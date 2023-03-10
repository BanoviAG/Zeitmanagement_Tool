<?php /* Template Name: Profil */ 
require 'template-parts/validation/validateUser.php';
include 'functions/getProfile.php';

global $current_user;
$current_user = wp_get_current_user();
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-4">

                    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" width="100%" />

                </div>
                
                <div class="col-4">
                
                    <?php 
                    $row = mysqli_fetch_assoc($query_runGetProfile);
                    echo 'Benutzername: ' . $row['display_name']; 
                    echo '<br/>';
                    echo 'E-Mail: ' . $row['user_email'];
                    echo '<br/>';
                    echo 'Arbeitsumfang: ' . $row['arbeitsumfang'] . '%';
                    echo '<br/> <br/>';
                    echo '<a class="black" href="../wp-content/themes/Zeitmanagement_Tool/profil?edit=', $row["ID"], '">Benutzer editieren</a>';

                    ?>

                </div>

                <?php
                $id = $_SERVER['QUERY_STRING'];
                $id = ltrim($id, 'edit=');
                ?>

                <div class="col-4">

                    <div id="editProfile_form" style="display:none;">
                       
                        <form action="../wp-content/themes/Zeitmanagement_Tool/functions/editProfile.php?edit=<?php echo $id ?>" name="editProfile_form" id="editProfile_form" method="post">
                            
                            <div class="row">
                                
                                <div class="col-12">
    
                                    <label for="username">Username:</label> <br/>
                                    <input type="text" name="username" id="username">
    
                                </div>
    
                                <div class="col-12 mt-3">
    
                                    <label for="email">E-Mail:</label> <br/>
                                    <input type="email" name="email" id="email">
    
                                </div>

                                <div class="col-12 mt-3">

                                <label>Arbeitsumfang</label>

                                    <div>

                                        <select name="arbeitsumfang">

                                            <option value='100'>100%</option>

                                            <option value='80'>80%</option>

                                            <option value='60'>60%</option>

                                            <option value='40'>40%</option>

                                            <option value='20'>20%</option>

                                        </select>

                                    </div>

                                </div>
    
                                <div class="col-12 mt-3">

                                    <button type="submit" class="btn btn-primary">Benutzer editieren</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
        
    </main>

</div>

<?php get_footer(); ?>