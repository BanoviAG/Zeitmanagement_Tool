<?php /* Template Name: Kunden */ get_header();
require 'functions/getContacts.php';
require 'functions/deleteContacts.php';
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                    <?php
                    $contacts = GetContacts();


                    echo '<table>',
                            '<th>',
                            '<b>ID</b>',
                            '</th>',

                            '<th>',
                            '<b>FIRMA</b>',
                            '</th>',

                            '<th>',
                            '<b></b>',
                            '</th>',

                            '<th>',
                            '<b></b>',
                            '</th>',

                            '<th>',
                            '<b><a href="http://localhost/Zeitmanagement_Tool/kunde-hinzufuegen/"><i class="fa fa-plus" aria-hidden="true"></i></a></b>',
                            '</th>';

                    foreach ($contacts as $contact){
                        echo '<tr>', '<td>', $contact->id, '</td>', '<td>', $contact->name, '</td>', '<td>', '<a href="#" onclick="editContact();"><i class="fa fa-pencil" aria-hidden="true"></i></a>', '</td>', '<td>', '<a href="../wp-content/themes/Zeitmanagement_Tool/functions/deleteContacts.php?delete=' . $contact->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a>', '</td>', '<td>', '<i class="fa fa-check" aria-hidden="true"></i>', '</td>', '</tr>';
                    }
                    echo    '</table>';
                    ?>

                </div>

                <div class="col-4">

                    <div id="editContact_form" style="display:none;">
                        
                        <form action="../wp-content/themes/Zeitmanagement_Tool/functions/editContacts.php?edit=<?php echo $contact->id; ?>" name="editContact_form" id="editContact_form" method="post">
                            
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
                                    <div><input type="text" id="txtPlz" name="txtPlz" placeholder="PLZ"></div>

                                </p>

                                <p>

                                    <label for="txtCity">Stadt</label>
                                    <div><input type="text" id="txtCity" name="txtCity" placeholder="Stadt"></div>

                                </p>
                                
                            <input type="submit" name="editContact_form" id="editContact_form">

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </main>

</div>

<?php get_footer(); ?>