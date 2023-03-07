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
                    if($row['arbeitsumfang'] == 100){
                        $soll = 40;
                        echo 'Diese Woche zu arbeiten: ' . $soll . 'h'; 
                        } 
                        else if($row['arbeitsumfang'] == 80) {
                            $soll = 32;
                            echo 'Diese Woche zu arbeiten: ' . $soll . 'h'; 
                        }
                        else if ($row['arbeitsumfang'] == 60) {
                            $soll = 24;
                            echo 'Diese Woche zu arbeiten: ' . $soll . 'h'; 
                        }
                        else if ($row['arbeitsumfang'] == 40) {
                            $soll = 16;
                            echo 'Diese Woche zu arbeiten: ' . $soll . 'h'; 
                        }
                        else {
                            $soll = 8;
                            echo 'Diese Woche zu arbeiten: ' . $soll . 'h'; 
                        }
                        
                    $hours = floor($row['SUM(`total_seconds`)'] / 3600);
                    $minutes = floor(($row['SUM(`total_seconds`)'] / 60) % 60);
                    echo '<br/>' , 'Bis jetzt gearbeitet: ' . $hours . ':' . $minutes . 'h';
                    echo '<br/>';
                    $minutes = $minutes / 100;
                    $ist = $hours + $minutes;
                    $output = (float)floor($soll) - (float)($ist);
                    echo 'Noch zu arbeiten: ' . $output . 'h';
                    ?>
                </div>

            </div>

        </div>
        
    </main>

</div>

<?php get_footer(); ?>