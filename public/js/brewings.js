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

        btn.innerHTML = hours + ":" + minutes + ":" + seconds;
    
        if (distance <= 0) {
          clearInterval(x);
          btn.innerHTML = "Kész!";
        }
    }, 1000);

    btn.setAttribute('disabled','disabled');
}

if (date.getHours >= brewFinishDate){
    btn.setAttribute('enabled','enabled');
}

var btn = document.createElement("BUTTON");
btn.innerHTML = "Főzés!";
document.getElementById("picture").appendChild(btn);
btn.addEventListener("click", Time);