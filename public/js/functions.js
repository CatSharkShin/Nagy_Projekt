function fillUi(data){
    var moneyElements = document.getElementsByClassName('money');
    [].forEach.call(moneyElements, function (moneyEl) {
        moneyEl.innerHTML = data['money']+" G";
    });
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function setSession() {
    var uid = getCookie("uid");

    $.ajax({
        type: "POST",
        url: 'private/actions/async.php',
        dataType: 'json', // type of response data
        data: {
                action: 'session',
                id: uid,
            },
        success: function (data,status,xhr) {
            $(document).ready(function () {
                console.log(data)
                fillUi(data);      
            }
            )
        },
        error: function (jqXhr, textStatus, errorMessage) {
            var parsedErrorMEssage = $.parseJSON(errorMessage); 
            console.log('Error: ' + parsedErrorMEssage);
        },
    });
    
}
function sellItem(refresh_id,item_id){
  var uid = getCookie("uid");

    $.ajax({
        type: "POST",
        url: 'private/actions/async.php',
        dataType: 'json', // type of response data
        data: {
                action: 'sell',
                id: uid,
                item_id: item_id,
            },
        success: function (data,status,xhr) {
            $(document).ready(function () {
                console.log(data);
                d.getElementById(refresh_id).innerHTML = "generateInventory('"+refresh_id+"',getItems());";
            }
            )
        },
        error: function (jqXhr, textStatus, errorMessage) {
            var parsedErrorMEssage = $.parseJSON(errorMessage); 
            console.log('Error: ' + parsedErrorMEssage);
        },
    });
}