var brewSkill = 5;
var date = new Date();
var brewFinishDate = new Date();
var distance = brewSkill * 60 * 60;

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
        }
    }, 1000);

    document.getElementById("brewbtn").setAttribute('disabled','disabled');
}

if (date.getHours >= brewFinishDate){
    document.getElementById("brewbtn").setAttribute('enabled','enabled');
}

//var btn = document.createElement("BUTTON");
//btn.innerHTML = "Főzés!";
//document.body.appendChild(btn);
document.getElementById("brewbtn").addEventListener("click", Time);