<?php /* Template Name: User hinzufügen */ 
require 'functions/getUsers.php';
require 'template-parts/connection/db-connection.php';
require 'template-parts/validation/validateUser.php';
require 'template-parts/validation/validateInput.php';

global $wpdb;
if($_POST){
    $username = $wpdb->escape($_POST['username']);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $ConfPassword = $wpdb->escape($_POST['password2']);
    $role = $_POST['role'];
    $arbeitsumfang = $_POST['arbeitsumfang'];

    $query_checkEmail = mysqli_query($con, "SELECT user_email FROM wp_users WHERE user_email = '$email'"); 
    if(mysqli_num_rows($query_checkEmail)) {
        echo ("<script LANGUAGE='JavaScript'>
                window.location.href='http://localhost/Zeitmanagement_Tool/benutzer-hinzufuegen/?error=emailexists';
                </script>");
        exit();
    }

    if(emptyInputSignup($email, $username, $password, $ConfPassword) !== false){
        
        echo ("<script LANGUAGE='JavaScript'>
                window.location.href='http://localhost/Zeitmanagement_Tool/benutzer-hinzufuegen/?error=emptyinput';
                </script>");
        exit();

    }

    if(invalidEmail($email) !== false){

        echo ("<script LANGUAGE='JavaScript'>
                window.location.href='http://localhost/Zeitmanagement_Tool/benutzer-hinzufuegen/?error=invalidemail';
                </script>");
        exit();

    }

    if(pwdMatch($password, $ConfPassword) !== false){

        echo ("<script LANGUAGE='JavaScript'>
                window.location.href='http://localhost/Zeitmanagement_Tool/benutzer-hinzufuegen/?error=passworddontmatch';
                </script>");
        exit();

    }
        $user_data = array(
            'user_login' => $username,
            'user_email' => $email,
            'display_name' => $username,
            'user_pass' => $password,
            'role' => $role
        );
        $result = wp_insert_user($user_data);
        $query_registerUser = "UPDATE wp_users SET arbeitsumfang = $arbeitsumfang WHERE user_email = '$email'";
        $query_run = mysqli_query($con, $query_registerUser);
    }

?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                    <form name="form_role" id="form_role" method="post">
                        
                        <p>
                    
                            <label for="username">Benutzername</label>
                            <div><input type="text" id="username" name="username" placeholder="Username"></div>
                    
                        </p>
                    
                        <p>
                    
                            <label for="email">E-Mail-Adresse</label>
                            <div><input type="email" id="email" name="email" placeholder="E-Mail"></div>
                    
                        </p>
                    
                        <p>
                    
                            <label>Rolle</label>
                            <div>
                                <select name="role">
                                    <option value='administrator'>Super-Administrator</option>
                                    <option value='_administrator'>Administrator</option>
                                    <option value='mitarbeiter'>Mitarbeiter</option>
                                </select>
                            </div>
                    
                        </p>

                        <p>
                    
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
                    
                        </p>
                    
                        <p>
                    
                            <label for="password">Passwort</label>
                            <div><input type="password" id="password" name="password" placeholder="Password"></div>
                    
                        </p>
                    
                        <p>
                    
                            <label for="password2">Passwort wiederholen</label>
                            <div><input type="password" id="password2" name="password2" placeholder="Password"></div>
                    
                        </p>
                    
                        <input name="Submit" type="submit">
                    </form>

                    <?php
                    if (strpos($_SERVER['REQUEST_URI'], "emptyinput") !== false){
                        echo '<p class="error">Bitte alle Felder ausfüllen</p>';

                    } else if (strpos($_SERVER['REQUEST_URI'], "invalidemail") !== false) {
                        echo '<p class="error">Bitte korrektes E-Mail Format verwenden</p>';

                    } else if (strpos($_SERVER['REQUEST_URI'], "emailexists") !== false) {
                        echo '<p class="error">E-Mail-Adresse wird bereits verwendet</p>';

                    } else if (strpos($_SERVER['REQUEST_URI'], "passworddontmatch") !== false) {
                        echo '<p class="error">Passwörter stimmen nicht überein</p>';
                    }
                    ?>

                </div>
                
                <div class="col-4">

                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){ ?> <p id="success">Benutzer erfolgreich erstellt</p> <br/> <a class="text-link" href="http://localhost/Zeitmanagement_Tool/benutzer-verwalten/">Zurück</a> <?php } ?>

                </div>

            </div>

        </div>
        
    
    </main>

</div>

<?php get_footer(); ?>