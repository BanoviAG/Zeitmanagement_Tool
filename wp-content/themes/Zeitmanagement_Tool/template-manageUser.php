<?php /* Template Name: User verwalten */ 
require 'functions/getUsers.php';
require 'template-parts/connection/db-connection.php';
require 'template-parts/validation/validateUser.php';
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row       
                        echo '<table>',
                                '<th>',
                                    '<b>Benutzername</b>',
                                '</th>',
                
                                '<th>',
                                    '<b>E-Mail</b>',
                                '</th>',
                
                                '<th>',
                                    '<b>Arbeitsumfang</b>',
                                '</th>',
                
                                '<th>',
                                    '<b></b>',
                                '</th>',
                                '<th>',
                                    '<b><a href="http://localhost/Zeitmanagement_Tool/benutzer-hinzufuegen/"><i class="fa fa-plus" aria-hidden="true"></i></a></b>',
                                '</th>';

                    while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>",
                                    "<td>" , 
                                        $row["display_name"] , 
                                    "</td>" ,
                                    "<td>" , 
                                        $row["user_email"] , 
                                    "</td>" , 
                                    "<td>" , 
                                        $row["arbeitsumfang"] , 
                                    "</td>", 
                                    '<td>', 
                                        '<a href="../wp-content/themes/Zeitmanagement_Tool/benutzer-verwalten?edit=', $row["ID"], '"', '"><i class="fa fa-pencil" aria-hidden="true"></i></a>',
                                    '</td>',
                                    '<td>', 
                                        '<a href="../wp-content/themes/Zeitmanagement_Tool/functions/getUsers.php?delete=' . $row["ID"] . '"><i class="fa fa-trash" aria-hidden="true"></i></a>', 
                                    '</td>',
                                "</tr>"; 
                            }
                            echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
                
                <div class="col-4">

                    <?php
                    $id = $_SERVER['QUERY_STRING'];
                    $id = ltrim($id, 'edit=');
                    ?>

                    <div id="editUser_form" style="display:none;">
                        
                        <form action="../wp-content/themes/Zeitmanagement_Tool/functions/editUsers.php?edit=<?php echo $id ?>" name="editUser_form" id="editUser_form" method="post">
                            
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