<?php /* Template Name: Rollen */ 
require 'template-parts/validation/validateUser.php';
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-12">

                    <table class="roles">

                        <tbody>

                            <tr>
                                <td>&nbsp;</td>
                                <td><b>Mitarbeiter</b></td>
                                <td><b>Administrator</b></td>
                                <td><b>Super-Administrator</b></td>
                            </tr>

                            <tr>
                                <td>Zeit eintragen</td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>

                            <tr>
                                <td>Zeit Übersicht</td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>

                            <tr>
                                <td>Profil bearbeiten</td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>

                            <tr>
                                <td>Benutzer verwalten</td>
                                <td class="center">&nbsp;</td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>

                            <tr>
                                <td>Kunde verwalten</td>
                                <td class="center">&nbsp;</td>
                                <td class="center">&nbsp;</td>
                                <td class="center"><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
        
    </main>

</div>

<?php get_footer(); ?>