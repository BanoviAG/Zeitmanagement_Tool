<?php /* Template Name: Kunde hinzufügen */ 
require 'template-parts/validation/validateUser.php';

?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                    <div id="addUser_form">

                        <form action="../wp-content/themes/Zeitmanagement_Tool/functions/addContacts.php" name="addContact_form" id="addContact_form" method="post">
                            
                            <p>
                                
                                <label for="txtCompany">Firma</label>
                                <div><input type="text" id="txtCompany" name="txtCompany" placeholder="Firma"></div>
                                
                            </p>

                            <p>

                                <label for="txtAdress">Adresse</label>
                                <div><input type="text" id="txtAdress" name="txtAdress" placeholder="Adresse"></div>
                                
                            </p>
                            
                            <p>
                                
                                <label for="txtPlz">Postleitzahl</label>
                                <div><input type="number" id="txtPlz" name="txtPlz" placeholder="PLZ"></div>

                            </p>
                            

                            <p>

                            <label for="txtCity">Stadt</label>
                            <div><input type="text" id="txtCity" name="txtCity" placeholder="Stadt"></div>

                            </p>
                            
                            <input type="submit" name="addContact_form" id="addContact_form">
                            
                        </form>

                    </div>

                </div>
                
                <div class="col-4">

                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){ ?> <p id="success">Kunde erfolgreich hinzugefügt</p> <br/> <a class="text-link" href="http://localhost/Zeitmanagement_Tool/kunden/">Zurück</a> <?php } ?>

                </div>

            </div>

        </div>
        
    
    </main>

</div>

<?php get_footer(); ?>