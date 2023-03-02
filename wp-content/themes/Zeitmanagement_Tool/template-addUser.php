<?php /* Template Name: User hinzufügen */ 
require 'functions/getUsers.php';
require 'template-parts/connection/db-connection.php';
require 'template-parts/validation/validateUser.php';

global $wpdb;
if($_POST){
    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);
    $role = $_POST['role'];
    $arbeitsumfang = $_POST['arbeitsumfang'];

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
                    
                            <label for="txtUsername">Benutzername</label>
                            <div><input type="text" id="txtUsername" name="txtUsername" placeholder="Username"></div>
                    
                        </p>
                    
                        <p>
                    
                            <label for="txtEmail">E-Mail-Adresse</label>
                            <div><input type="email" id="txtEmail" name="txtEmail" placeholder="E-Mail"></div>
                    
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
                    
                            <label for="txtPassword">Passwort</label>
                            <div><input type="password" id="txtPassword" name="txtPassword" placeholder="Password"></div>
                    
                        </p>
                    
                        <p>
                    
                            <label for="txtConfirmPassword">Passwort wiederholen</label>
                            <div><input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Password"></div>
                    
                        </p>
                    
                        <input name="Submit" type="submit">
                    </form>

                </div>
                
                <div class="col-4">

                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){ ?> <p id="success">Benutzer erfolgreich erstellt</p> <br/> <a class="text-link" href="http://localhost/Zeitmanagement_Tool/benutzer-verwalten/">Zurück</a> <?php } ?>

                </div>

            </div>

        </div>
        
    
    </main>

</div>

<?php get_footer(); ?>