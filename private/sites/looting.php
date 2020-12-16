<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <script>
            var date = new Date();
            var lootfinishdate = new Date();

            var hours = 0;
            var minutes = 0;
            var seconds = 0;   

            function Loot(boltid){
                //alert(id);
                var uid = getCookie("uid");
                $.ajax({
                    type: "POST",
                    url: 'private/actions/async.php',
                    dataType: 'json', // type of response data
                    data: {
                            action: 'loot',
                            id: uid,
                            boltid: boltid,
                        },
                    success: function (data,status,xhr) {
                    
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        var parsedErrorMEssage = $.parseJSON(errorMessage); 
                        console.log('Error: ' + parsedErrorMEssage);
                    },
                });
            }

            function Time(time, btnid) {

                distance = time * 60;

                if(time > 60){
                    hours = time / 60;
                }
                else hours = 0;

                if(hours == 0 && time <= 59){
                    minutes = time;
                }
                else minutes = 0;
                
                if (minutes == 0 && distance < 59){
                    seconds = distance;
                }
                else seconds = 0;

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

                   document.getElementById(btnid).innerHTML = hours + ":" + minutes + ":" + seconds;
    
                   if (distance <= 0) {
                     clearInterval(x);
                     document.getElementById(btnid).innerHTML = "Kész!";
                   }
              }, 1000);

             document.getElementById(btnid).setAttribute('disabled','disabled');
            }

            if (date.getHours >= lootfinishdate){
               document.getElementById(btnid).setAttribute('enabled','enabled');
            }
            
    </script>
        <div class="looting-container">
            <div class="items">
                <br>
                Items
               <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'angler_fish.svg'?>">
                        <br>
                        <span>0</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'ballfish.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'catfish.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'catshark.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'clown_fish.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'fish.svg'?>">
                        <br>
                        <span>0</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'fish2.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'koi.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'shark.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'swordfish.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'peach.svg'?>">
                        <br>
                        <span>0</span>
                        </a>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'pear.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'plum.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'pear.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'peach.svg'?>">
                        <br>
                        <span>0</span>
                        </a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="looting">
                <br>
                Looting
                <table>
                <tbody>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Piac (1.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_1" class="btn" onclick="Time(10,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Kisbolt (1.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_2" class="btn" onclick="Time(11,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Coop (1. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_3" class="btn" onclick="Time(12,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Spar (1. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_4" class="btn" onclick="Time(15,this.id); Loot(this.id);">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span>Tesco (1. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_5" class="btn" onclick="Time(18,this.id); Loot(this.id);">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Piac (2.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_6" class="btn" onclick="Time(20,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Kisbolt (2.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_7" class="btn" onclick="Time(22,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Coop (2. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_8" class="btn" onclick="Time(25,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Spar (2. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_9" class="btn" onclick="Time(28,this.id); Loot(this.id);">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Tesco (2. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_10" class="btn" onclick="Time(30,this.id); Loot(this.id);">loot</button></td>
                    </tr>
                    <tr>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Piac (3.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_11" class="btn" onclick="Time(33,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Kisbolt (3.szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_12" class="btn" onclick="Time(35,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Coop (3. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_13" class="btn" onclick="Time(40,this.id); Loot(this.id);">loot</button>
                        </td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Spar (3. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_14" class="btn" onclick="Time(45,this.id); Loot(this.id);">loot</button></td>
                        <td>
                        <a>
                        <img src="<?=PATH_SVGS.'market.svg'?>">
                        <br>
                        <span> Tesco (3. szint)</span>
                        <br>
                        </a>
                        <button id="btn_loot_15" class="btn" onclick="Time(50,this.id); Loot(this.id);">loot</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
