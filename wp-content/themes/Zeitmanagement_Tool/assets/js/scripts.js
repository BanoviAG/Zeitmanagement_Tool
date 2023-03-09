(function ($, root, undefined) {

    
    $(function () {
        
        'use strict'; 
        
        let showTime = document.querySelector("#output");
        let startTimeButton = document.querySelector("#start")
        let pauseTimeButton = document.querySelector("#pause")
        pauseTimeButton.style.display = "none";

        let seconds = 0;
        
        let interval = null;
        
        const timer = () => {
            seconds++;
            localStorage.setItem("stopwatchSeconds", seconds);
            
            let hours = Math.floor(seconds / 3600);

            let minutes = Math.floor((seconds - hours * 3600) / 60);

            let secs = Math.floor(seconds % 60);

        if (hours < 10) {
            hours = `0${hours}`;
        }
        if (minutes < 10) {
            minutes = `0${minutes}`;
        }
        if (secs < 10) {
            secs = `0${secs}`;
        }

        showTime.innerHTML = `${hours}:${minutes}:${secs}`;

    };
    
    startTimeButton.addEventListener("click", () => {
        pauseTimeButton.style.display = "block";
        startTimeButton.style.display = "none";
        
        if (interval) {
            return;
        }

        interval = setInterval(timer, 1000);
    });

        pauseTimeButton.addEventListener("click", () => {
            pauseTimeButton.style.display = "none";
            startTimeButton.style.display = "block";
        clearInterval(interval);
        interval = null;
        
    });

        $('#start, #pause').submit(function(e){
            e.preventDefault();
        })
        
        $(function(){
            $('#start').click(function(e) {  
                var start = 1;
              $.ajax
              ({ 
                  url: 'wp-content/themes/Zeitmanagement_Tool/functions/timestamp.php',
                  data: {start},
                  method: 'post'
                });
                
            });
         });

         $(function(){
            $('#pause').click(function(e) {  
                var pause = 1;
                $.ajax
                ({ 
                    url: 'wp-content/themes/Zeitmanagement_Tool/functions/timestamp.php',
                    data: {pause},
                    method: 'post'
               });
               
           });
        });

    });


})(jQuery, this);

function editContact() {
    document.getElementById('editContact_form').style.display = "block";
}

if (window.location.href.indexOf("benutzer-verwalten/?edit=") > -1) {
    document.getElementById('editUser_form').style.display = "block";
}
