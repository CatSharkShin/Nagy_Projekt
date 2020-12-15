<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/public/css/style.css">
    </head>
    <body>
        <!--<script src="public/js/brewings.js"></script> -->

        <script>
            var brewSkill = 5;
            var date = new Date();
            var brewFinishDate = new Date();
            var distance = brewSkill * 60 * 60;

            var apricot = false;
            var pear = false;
            var plum = false;

            var hours = 0;
            var minutes = 0;
            var seconds = 0;

            if  ((brewSkill - 1) > 0){
                hours = brewSkill - 1;
            }
            else hours = 0;

            if (hours == 0 && (distance / 60) < 59){
                minutes = distance / 60;
            }
            else minutes = 59;

            if (minutes == 0 && distance < 59){
               seconds = distance;
            }
            else seconds = 59;

            function Time() {
               brewFinishDate = date.getHours() + brewSkill;

               var x = setInterval(function() {
    
                 seconds--;
                    if (seconds <= 0){
                        seconds = 59;
                        minutes--;
                       if (minutes <= 0) {
                           minutes = 59;
                           hours--;
                       }
                   }
                   distance--;

                   document.getElementById("brewbtn").innerHTML = hours + ":" + minutes + ":" + seconds;
    
                   if (distance <= 0) {
                     clearInterval(x);
                     document.getElementById("brewbtn").innerHTML = "Kész!";
                     if(apricot){
                        alert("Barackpálinkát kaptál!");
                     }
                     if(pear){
                         alert("Körtepálinkát kaptál!");
                     }
                     if(plum){
                         alert("Szilvapálinkát kaptál!");
                     }
                   }
              }, 1000);

             document.getElementById("brewbtn").setAttribute('disabled','disabled');
            }

            if (date.getHours >= brewFinishDate){
               document.getElementById("brewbtn").setAttribute('enabled','enabled');
            }
            function Disable(){
                document.getElementById("Apricot").setAttribute('disabled','disabled');
                document.getElementById("Pear").setAttribute('disabled','disabled');
                document.getElementById("Plum").setAttribute('disabled','disabled');
            }

            function Apricot() {
                apricot = true;
                Disable();
            }
            function Pear() {
                pear = true;
                Disable();
            }
            function Plum() {
                plum = true;
                Disable();
            }
        </script>

        <div class="brewing">
            <div class="brewingpicture">
                <img class="brewimg" src="public/images/brewing.jpg">
             </div>

            <div class="brewingitems">
                <div class="box">
                    <a>
                        <img id="Apricot" onclick="Apricot()" src="<?=PATH_SVGS.'tin_can.svg'?>">
                    </a>
                </div>
                <br>
                <div class="box">
                     <a>
                        <img id="Pear" onclick="Pear()" src="<?=PATH_SVGS.'tin_can.svg'?>">
                    </a>
                </div>
                <br>
                <div class="box">
                    <a>
                        <img id="Plum" onclick="Plum()" src="<?=PATH_SVGS.'tin_can.svg'?>">
                    </a>
                </div>
                <button id="brewbtn" class="btn" onclick="Time()">Főzés</button>
            </div>
        </div>
    </body>
</html>