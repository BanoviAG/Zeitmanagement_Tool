<?php /* Template Name: Login */ get_header(); 

// Register
global $wpdb;
require ('wp-content/themes/zeitmanagement_tool/template-parts/connection/db-connection.php');
if($_POST){
    $username = $wpdb->escape($_POST['username']);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $ConfPassword = $wpdb->escape($_POST['password2']);

    $user_data = array(
        'user_login' => $username,
        'user_email' => $email,
        'display_name' => $username,
        'user_pass' => $password
    );
    $result = wp_insert_user($user_data);
    $query = "UPDATE wp_users SET arbeitsumfang = 100 WHERE user_email = '$email'";
    $query_run = mysqli_query($con, $query);

}

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                    <form name="register" id="register" method="post">
                        
                        <h1>Registrieren</h1>

                        <div class="row">

                            <div class="col-12">

                                <label for="username">Username:</label> <br/>
                                <input type="text" name="username" id="username">
                            
                            </div>

                            <div class="col-12">

                                <label for="email">E-Mail:</label> <br/>
                                <input type="email" name="email" id="email">

                            </div>
    
                            <div class="col-12">

                                <label for="password">Passwort:</label> <br/>
                                <input type="password" name="password" id="password">

                            </div>
    
                            <div class="col-12">

                                <label for="password2">Passwort wiederholen:</label> <br/>
                                <input type="password" name="password2" id="password2">

                            </div>
    
                            <div class="col-12 pt-3">

                                <button type="submit" name="form_role" id="form_role">Registrieren</button>

                            </div>

                        </div>

                    </form>

                </div>

                <div class="col-4">

                <h1>Anmelden</h1>

                <?php 

                    if ( ! is_user_logged_in() ) {
                        $args = array(
                            'redirect' => 'http://localhost/Zeitmanagement_Tool/',
                            'form_id' => 'login_form',
                            'label_username' => __( 'Benutzername oder E-Mail-Adresse:' ),
                            'label_password' => __( 'Passwort:' ),
                            'label_remember' => __( 'Angemeldet bleiben' ),
                            'label_log_in' => __( 'Anmelden' ),
                            'remember' => true
                        );
                    wp_login_form( $args );
                    } else {
                        ?> <p>Sie sind bereits eingeloggt</p> <?php 
                    }

                ?>

                </div>

            </div>

        </div>

    </main>

</div>

<?php get_footer(); ?>