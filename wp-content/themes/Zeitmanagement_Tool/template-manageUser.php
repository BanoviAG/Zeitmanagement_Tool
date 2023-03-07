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
                        echo '<table style="width:100%;">',
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
                                        '<a href="../wp-content/themes/Zeitmanagement_Tool/functions/getUsers.php?delete=' . $row["user_email"] . '"><i class="fa fa-trash" aria-hidden="true"></i></a>', 
                                    '</td>',
                                    '<td>', 
                                        '', 
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

                </div>

            </div>

        </div>
        
    
    </main>

</div>

<?php get_footer(); ?>