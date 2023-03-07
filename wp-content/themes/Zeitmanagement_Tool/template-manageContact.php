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
                        echo '<tr>', '<td>', $contact->id, '</td>', '<td>', $contact->name, '</td>', '<td>', '<a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>', '</td>', '<td>', '<a href="../wp-content/themes/Zeitmanagement_Tool/functions/deleteContacts.php?delete=' . $contact->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a>', '</td>', '<td>', '<i class="fa fa-check" aria-hidden="true"></i>', '</td>', '</tr>';
                    }
                    echo    '</table>';
                    ?>

                </div>

                <div class="col-4">

                </div>

            </div>
        </div>

    </main>

</div>

<?php get_footer(); ?>