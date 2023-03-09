<?php /* Template Name: Übersicht */ 
require 'template-parts/validation/validateUser.php';
include 'functions/getTimeWorked.php';
require 'vendor/autoload.php';
?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main">

        <div class="container">

            <div class="row pt-5">

                <div class="col-8">

                <?php

                $calendar = new donatj\SimpleCalendar();

                while ($row = mysqli_fetch_array($query_runSecondsWorkedToday, MYSQLI_ASSOC))
                {
                    $hours = floor($row['total_seconds'] / 3600);

                    $minutes = floor(($row['total_seconds'] / 60) % 60);

                    $seconds = $row['total_seconds'] % 60;

                    $calendar->addDailyHtml("{$hours}:{$minutes}h", "{$row['DATE(`check_in`)']}");
                }

                $calendar->setWeekDayNames([ 'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag' ]);

                $calendar->setStartOfWeek('Montag');

                echo $calendar->render();

                ?>

                </div>
                
                <div class="col-4">
                    <?php
                    $row = mysqli_fetch_array($query_runDatesThisWeek, MYSQLI_ASSOC);

                    echo "<table>",
                            "<tbody>";
                    if($row['arbeitsumfang'] == 100){

                        $soll = 40;
                        echo '<tr>', 
                                '<td>',
                                    '<p>Diese Woche zu arbeiten: </p>', 
                                '</td>', 
                                "<td>",
                                    "<p>" . $soll . 'h', '</p>',
                                '</td>',
                              '</tr>'; 
                        } 

                        else if($row['arbeitsumfang'] == 80) {

                            $soll = 32;
                            echo '<tr>', 
                                    '<td>',
                                        '<p>Diese Woche zu arbeiten: </p>', 
                                    '</td>', 
                                    "<td>",
                                        "<p>" . $soll . 'h', '</p>',
                                    '</td>',
                                  '</tr>'; 
                            } 

                        else if ($row['arbeitsumfang'] == 60) {

                            $soll = 24;
                            echo '<tr>', 
                                    '<td>',
                                        '<p>Diese Woche zu arbeiten: </p>', 
                                    '</td>', 
                                    "<td>",
                                        "<p>" . $soll . 'h', '</p>',
                                    '</td>',
                                  '</tr>'; 
                            } 

                        else if ($row['arbeitsumfang'] == 40) {

                            $soll = 16;
                            echo '<tr>', 
                                    '<td>',
                                        '<p>Diese Woche zu arbeiten: </p>', 
                                    '</td>', 
                                    "<td>",
                                        "<p>" . $soll . 'h', '</p>',
                                    '</td>',
                                  '</tr>'; 
                            } 

                        else {

                            $soll = 8;
                            echo '<tr>', 
                                    '<td>',
                                        '<p>Diese Woche zu arbeiten: </p>', 
                                    '</td>', 
                                    "<td>",
                                        "<p>" . $soll . 'h', '</p>',
                                    '</td>',
                                  '</tr>'; 
                            } 
                            
                            $hours = floor($row['SUM(`total_seconds`)'] / 3600);
                            $minutes = floor(($row['SUM(`total_seconds`)'] / 60) % 60);
                            ?>
                            <tr>
                                <td>
                                    <p>Bis jetzt gearbeitet: </p>
                                </td>
                                <td>
                                    <p><?php echo $hours . ':' . $minutes . 'h'; ?></p>
                                </td>
                            </tr>
                            <?php
                            $minutes = $minutes / 100;
                            $ist = $hours + $minutes;
                            $output = (float)floor($soll) - (float)($ist);
                            ?>
                            <tr>
                                <td>
                                    <p>Noch zu arbeiten: </p>
                                </td>
                                <td>
                                    <p><?php echo $output . 'h'; ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        
                </div>

            </div>

        </div>
        
    </main>

</div>

<?php get_footer(); ?>